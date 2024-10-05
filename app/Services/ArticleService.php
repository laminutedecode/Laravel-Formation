<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Notifications\ArticleNotification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ArticleService
{
    public function createArticle(array $data): Article
    {
        $category = Category::firstOrCreate(['name' => $data['category']]);
        $data['category_id'] = $category->id;
        $data['author_id'] = Auth::id(); 
        if (isset($data['image'])) {
            $imageName = time() . '.' . $data['image']->extension();
            $data['image']->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $article = Article::create($data);

        $admin  = User::where('email', 'laminutedecode@gmail.com')->first();
        $admin->notify(new ArticleNotification($article));

        return $article;
    }

    public function getUserArticles(): Collection
    {
        return Article::where('author_id', Auth::id())->get();
    }

    public function getArticleById(int $id): ?Article
    {
        return Article::findOrFail($id);
    }

    public function updateArticle(Article $article, array $data): bool
    {
        if (isset($data['image'])) {
            if ($article->image && file_exists(public_path($article->image))) {
                unlink(public_path($article->image));
            }
            $imageName = time() . '.' . $data['image']->extension();
            $data['image']->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        } else {
            $data['image'] = $article->image;
        }
        return $article->update($data);
    }


    public function deleteArticle(Article $article): ?bool
    {
        if ($article->image && file_exists(public_path($article->image))) {
            unlink(public_path($article->image));
        }
        return $article->delete();
    }
}