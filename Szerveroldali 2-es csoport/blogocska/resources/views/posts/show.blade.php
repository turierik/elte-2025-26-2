@extends('layouts.blog')

@section('title', $post -> title)

@section('content')
    <h1>{{ $post -> title }}</h1>
    Szerző: {{ $post -> author -> name }}<br>
    Létrehozva: {{ $post -> created_at }}<br>
    Címkék: @foreach ($post -> tags as $tag)
        <span style="color: {{ $tag -> color}}">{{$tag -> name}} </span>
    @endforeach
    <br><br>
    {{ $post -> content }}
    <br><br>
    <a href="{{ route('posts.index') }}">Vissza a főoldalra</a>
@endsection
