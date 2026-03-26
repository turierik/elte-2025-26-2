<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = Post::with('author') -> orderByDesc('created_at') -> paginate(8); // N+1 probléma megoldás: eager loading
        return view('posts.index', ['posts' => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);

        return view('posts.create', [
            // 'users' => User::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrUpdatePostRequest $request)
    {
        Gate::authorize('create', Post::class);

        $validated = $request -> validated();

        // $post = new Post();
        // $post -> title = $validated['title'];
        // $post -> content = $validated['content'];
        // $post -> author_id = $validated['author_id'];
        // $post -> save();

        if ($request -> hasFile('image')){
            $file = $request -> file('image');
            $fileName = Str::uuid() . "." . $file -> getClientOriginalExtension();
            Storage::disk('public') -> put("images/".$fileName, $file -> getContent());
            $validated['image_filename'] = $fileName;
        }

        $validated['author_id'] = Auth::id();
        $post = Post::create($validated);
        $post -> tags() -> attach($validated['tags'] ?? []);

        Session::flash('post-created', $post);

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
        Gate::authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrUpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $validated = $request -> validated();

        $post -> update($validated);
        $post -> tags() -> sync($validated['tags'] ?? []);

        Session::flash('post-updated', $post);
        return redirect() -> route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('update', $post); // update és delete feltétele most éppen megegyezik :)
        $deletedTitle = $post -> title; // ki kell szedni előre, mert törlés után $post null lesz
        $post -> delete();
        Session::flash('post-deleted', $deletedTitle);
        return redirect() -> route('posts.index');
    }
}
