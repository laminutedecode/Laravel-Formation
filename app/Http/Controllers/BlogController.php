<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use AuthorizesRequests;

    protected $articleService;

    public function __construct(ArticleService $articleService){
        $this->articleService = $articleService;
    }


    public function readCategories(){
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function createArticle(ArticleRequest $request){
        $validatedData = $request->validated();
        $this->articleService->createArticle($validatedData);
        
        return redirect()->route('dashboard')->with('success', "Article créé avec succes");
    }

    public function dashboardArticles():View {
        $articles = $this->articleService->getUserArticles();
        return view('dashboard', ['articles'=>$articles]);
    }

    public function dashboardArticleSingle($id): View {
        $article = $this->articleService->getArticleById($id);
        $categories = Category::all();
        return view('blog.update', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $article = $this->articleService->getArticleById($id);
    $this->authorize('update', $article);
    $this->articleService->updateArticle($article, $validatedData);
    return redirect()->route('dashboard', $id)->with('update', 'Article mis à jour avec succès !');
}

public function destroy($id){
    $article = $this->articleService->getArticleById($id);
    $this->articleService->deleteArticle($article);
    return redirect()->route('dashboard')->with('delete', 'Article supprimé avec succes');
}

public function index() : View {
    $articles = Article::all();
    return view('blog.index', ['articles'=>$articles]);
}

public function show($id) : View {
    $article = Article::with('author')->findOrFail($id);
    return view('blog.show', ['article'=>$article]);
}

    
}
