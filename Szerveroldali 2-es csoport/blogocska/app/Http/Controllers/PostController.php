<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = Post::with('author') -> paginate(8); // N+1 probléma megoldás: eager loading
        return view('posts.index', ['posts' => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'users' => User::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'title' => 'required|max:50',
            'content' => 'required|min:50',
            'author_id' => 'required|integer|exists:users,id',
            'tags' => 'array',
            'tags.*' => 'integer|distinct|exists:tags,id'
        ], [
            'title.required' => 'A cím kitöltése kötelező!',
            'title.max' => 'A cím legfeljebb :max karakter lehet!'
        ]);

        // $post = new Post();
        // $post -> title = $validated['title'];
        // $post -> content = $validated['content'];
        // $post -> author_id = $validated['author_id'];
        // $post -> save();

        $post = Post::create($validated);
        $post -> tags() -> attach($validated['tags'] ?? []);

        return redirect() -> route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
