<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('articles.create', [
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'author_id' => 'required|integer|exists:users,id',
            'categories' => 'array',
            'categories.*' => 'integer|distinct|exists:categories,id'
        ], [
            'title.required' => 'A cím kitöltése kötelező!',
            'title.min' => 'A cím legalább :min karakter legyen!'
        ]);
        $article = Article::create($validated);
        $article -> categories() -> attach($validated['categories'] ?? []);

        // $article = new Article();
        // $article -> title = $validated['title'];
        // $article -> content = $validated['content'];
        // $article -> author_id = $validated['author_id'];
        // $article -> save();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
