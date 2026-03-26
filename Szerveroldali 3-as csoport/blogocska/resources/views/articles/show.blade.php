@extends('layouts.main')

@section('title', $article -> title)

@section('content')
    <h1>{{ $article -> title }}</h1><br>

    @if ( $article -> image_filename !== null )
        <img src="{{ Storage::url('images/' . $article -> image_filename ) }}">
    @endif

    Szerző: {{ $article -> author -> name}}<br>
    Létrehozva: {{ $article -> created_at }}<br>
    Kategóriák: @foreach( $article -> categories as $cat )
        <span style="color: {{ $cat -> color }}">{{ $cat -> title}} </span>
    @endforeach
    <br><br>
    {!! $article -> content !!}
    <br><br>

    @can('update', $article)
        <a href="{{ route('articles.edit', [ 'article' => $article ])}}">Szerkesztés</a>
        <form action="{{ route('articles.destroy', [ 'article' => $article ])}}" method="post">
            @csrf
            @method('DELETE')
            <a href="#" class="text-red-500" onclick="event.preventDefault();this.closest('form').submit()">Törlés</a>
        </form>
    @endcan

    <a href="{{ route('articles.index') }}">Vissza a főoldalra</a>
@endsection
