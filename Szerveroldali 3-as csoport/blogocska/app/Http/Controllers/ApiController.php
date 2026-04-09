<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index(){
        return ArticleResource::collection(Article::all());
    }

    public function show(string $article){
        // if (filter_var($article, FILTER_VALIDATE_INT) === false)
        //    return response() -> json(["message" => "Article must be an integer."], 422);

        Validator::make(
            ['article' => $article],
            ['article' => 'required|integer']
        ) -> validate(); // ha hiba van = 422

        // $article = Article::find($article);
        // if ($article === null)
        //     return response() -> json(["message" => "Article not found."], 404);
        // return $article;

        return new ArticleResource(Article::findOrFail($article));
    }
}
