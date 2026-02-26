@extends('layouts.main')

@section('title', 'Kezdőlap')

@section('content')
    <h1>Minden cikk</h1>
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
