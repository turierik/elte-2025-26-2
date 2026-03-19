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
    @can('update', $post)
        <a href="{{ route('posts.edit', ['post' => $post])}}">Szerkesztés</a><br>

        <form action="{{ route('posts.destroy', ['post' => $post])}}" method="post">
            @csrf
            @method('DELETE')
            <a href="#" onclick="event.preventDefault();this.closest('form').submit();">
                Törlés
            </a>
        </form>
    @endcan
    <a href="{{ route('posts.index') }}">Vissza a főoldalra</a>
@endsection
