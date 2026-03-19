<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allArticles = Article::with('author') -> paginate(8); // N+1 probléma, eager loading
        return view('articles.index', ['articles' => $allArticles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create', [
            // 'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Article::class);

        $validated = $request -> validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            // 'author_id' => 'required|integer|exists:users,id',
            'categories' => 'array',
            'categories.*' => 'integer|distinct|exists:categories,id'
        ], [
            'title.required' => 'A cím kitöltése kötelező!',
            'title.min' => 'A cím legalább :min karakter legyen!'
        ]);

        $validated['author_id'] = Auth::id();

        $article = Article::create($validated);
        $article -> categories() -> attach($validated['categories'] ?? []);

        // $article = new Article();
        // $article -> title = $validated['title'];
        // $article -> content = $validated['content'];
        // $article -> author_id = $validated['author_id'];
        // $article -> save();

        Session::flash('article-created', $article -> title);

        return redirect() -> route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('update', $article);

        return view('articles.edit', [
            // 'users' => User::all(),
            'categories' => Category::all(),
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        Gate::authorize('update', $article);

        $validated = $request -> validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            // 'author_id' => 'required|integer|exists:users,id',
            'categories' => 'array',
            'categories.*' => 'integer|distinct|exists:categories,id'
        ], [
            'title.required' => 'A cím kitöltése kötelező!',
            'title.min' => 'A cím legalább :min karakter legyen!'
        ]);

        $article -> update($validated);
        $article -> categories() -> sync($validated['categories'] ?? []);

        Session::flash('article-updated', $article -> title);

        return redirect() -> route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('update', $article);
        $article -> delete();
        Session::flash('article-deleted', $article -> title);
        return redirect() -> route('articles.index');
    }
}
