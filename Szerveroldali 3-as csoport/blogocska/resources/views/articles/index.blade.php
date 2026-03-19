@extends('layouts.main')

@section('title', 'Kezdőlap')

@section('content')
    @if (Session::has('article-created'))
        <div class="bg-green-300 text-center mb-4">
            A(z) <b>{{ Session::get('article-created') }}</b> című cikk létrehozva!
        </div>
    @endif

    @if (Session::has('article-updated'))
        <div class="bg-green-300 text-center mb-4">
            A(z) <b>{{ Session::get('article-updated') }}</b> című cikk módosítva!
        </div>
    @endif

    @if (Session::has('article-deleted'))
        <div class="bg-yellow-300 text-center mb-4">
            A(z) <b>{{ Session::get('article-deleted') }}</b> című cikk törölve!
        </div>
    @endif

    <h1>Minden cikk</h1>

    @can('create', \App\Models\Article::class)
        <div class="text-right m-2"><a class="text-green-500" href="{{ route('articles.create') }}">Új cikk írása</a></div>
    @endcan

    @forelse ($articles as $article)
        <a href="
            {{ route('articles.show', $article) }}
        ">{{ $article -> title }}</a> <i>({{ $article -> author -> name }})</i><br>
    @empty
        Nincsenek még cikkek.
    @endforelse
    <br>
    {{ $articles -> links() }}
@endsection
