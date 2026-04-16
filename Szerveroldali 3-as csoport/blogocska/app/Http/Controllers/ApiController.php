<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request){
        $validated = $request -> validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);
        if (Auth::attempt($validated)){
            $user = User::where('email', $validated['email']) -> first();
            $token = $user -> createToken('loginToken');
            return response() -> json(["token" => $token -> plainTextToken], 201);
        } else {
            return response() -> json(["message" => "Login failed."], 401);
        }
    }

    public function store(Request $request){
        $validated = $request -> validate([
            'content' => 'required|string',
            'title' => 'required|string'
        ]);
        $validated['author_id'] = $request -> user() -> id;
        $article = Article::create($validated);
        return new ArticleResource($article);
    }

    public function indexCategories(string $article){
        Validator::make(
            ['article' => $article],
            ['article' => 'required|integer']
        ) -> validate();
        $article = Article::findOrFail($article);
        return $article -> categories;
    }

    public function updateCategories(string $article, Request $request){
        Validator::make(
            ['article' => $article],
            ['article' => 'required|integer']
        ) -> validate();
        $article = Article::findOrFail($article);
        $validated = $request -> validate([
            "add" => "array",
            "remove" => "array",
            "add.*" => "integer|distinct|exists:categories,id",
            "remove.*" => "integer|distinct|exists:categories,id",
        ]);
        // $article -> categories() -> attach($validated["add"] ?? []);
        $article -> categories() -> syncWithoutDetaching($validated["add"] ?? []);
        $article -> categories() -> detach($validated["remove"] ?? []);
        return $article -> categories;

        // Lásd még: https://github.com/turierik/2025-26-1-szwp-n3/blob/main/blogocska/app/Http/Controllers/ApiController.php
        // 1. validáció kiterjesztése, hogy ugyanaz az elem nem lehet benne "add"-ban és "remove"-ben
        // 2. válaszban esetszétválasztás: added, was already added, removed, was already removed
    }
}
