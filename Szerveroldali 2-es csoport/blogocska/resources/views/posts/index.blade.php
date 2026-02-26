@extends('layouts.blog')

@section('title', 'Kezdőlap')

@section('content')
    <h1>Minden bejegyzés</h1>
    <ul>
        @forelse ($posts as $post)
            <li><a href="{{ route('posts.show', [ 'post' => $post ]) }}">
                {{ $post -> title }}
            </a>({{ $post -> author -> name }})</li>
        @empty
            Nincs bejegyzés.
        @endforelse
    </ul>

    {{ $posts -> links() }}
@endsection
