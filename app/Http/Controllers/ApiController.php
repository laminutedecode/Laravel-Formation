<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $articles = Article::all();
        return response()->json([
            'success'=>true,
            'data'=> ArticleResource::collection($articles),
        ]);
    }

    public function show($id){
        try {
            $article = Article::findOrFail($id);
            return response()->json([
                'success'=>true,
                'data'=> new ArticleResource($article),
            ]);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' =>false,
                'message'=>'article non trouvé'
            ], 404);
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title'=> 'requis|string|max:255',
            'description'=> 'requis|string',
            'category_id'=> 'requis|integer|exists:category_id',
            'author_id'=> 'requis|integer|exists:user_id',
            'image'=> 'nullable|image|mines:jpeg,jpg,png|max:2048',
        ]);

        $article = Article::create($validatedData);

        return response()->json([
            'success'=> true,
            'data'=> new ArticleResource($article),
        ],201);
    }
}
