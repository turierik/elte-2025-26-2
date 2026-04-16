<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function index(){
        return PostResource::collection(Post::all());
    }

    public function show(string $post){
        // if (filter_var($post, FILTER_VALIDATE_INT) === false)
        //    return response() -> json(["message" => "ID must be integer."], 422);

        Validator::make(
            ['post' => $post],
            ['post' => 'required|integer']
        ) -> validate(); // api-nál validátor bukása = 422

        // $post = Post::find($post);
        // if ($post === null)
        //     return response() -> json(["message" => "Post not found."], 404);
        // return $post;

        return new PostResource(Post::findOrFail($post));
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
        $post = Post::create($validated);
        return new PostResource($post);
    }

    public function indexTags(string $post){
        Validator::make(
            ['post' => $post],
            ['post' => 'required|integer']
        ) -> validate(); // api-nál validátor bukása = 422
        $post = Post::findOrFail($post);
        return $post -> tags;
    }

    public function updateTags(string $post, Request $request){
        $validated = $request -> validate([
            "add" => "array",
            "remove" => "array",
            "add.*" => "integer|distinct|exists:tags,id",
            "remove.*" => "integer|distinct|exists:tags,id",
        ]);

         Validator::make(
            ['post' => $post],
            ['post' => 'required|integer']
        ) -> validate(); // api-nál validátor bukása = 422
        $post = Post::findOrFail($post);

        $post -> tags() -> syncWithoutDetaching($validated["add"] ?? []);
        $post -> tags() -> detach($validated["remove"] ?? []);

        return $post -> tags;

        // Érdemes megnézni, mert:
        // https://github.com/turierik/2025-26-1-szwp-n3/blob/main/blogocska/app/Http/Controllers/ApiController.php
        // 1. validátor kezeli, hogy add és remove nem tartalmazhatja ugyanaz
        // 2. válasz esetszétválasztás: added, already added, removed, already removed
    }
}
