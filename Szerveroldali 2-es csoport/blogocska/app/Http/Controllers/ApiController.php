<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
}
