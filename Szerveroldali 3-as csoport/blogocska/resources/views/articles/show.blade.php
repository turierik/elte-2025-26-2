@extends('layouts.main')

@section('title', $article -> title)

@section('content')
    <h1>{{ $article -> title }}</h1><br>
    Szerző: {{ $article -> author -> name}}<br>
    Létrehozva: {{ $article -> created_at }}
    <br><br>
    {{ $article -> content }}
    <br><br>
    <a href="{{ route('articles.index') }}">Vissza a főoldalra</a>
@endsection
