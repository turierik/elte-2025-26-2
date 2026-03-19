@extends('layouts.blog')

@section('title', 'Kezdőlap')

@section('content')

    @can('create', \App\Models\Post::class)
        <div class="text-right mr-4">
            <a href="{{ route('posts.create') }}">Új bejegyzés írása</a>
        </div>
    @endcan

    <h1>Minden bejegyzés</h1>

    @if (Session::has('post-created'))
        <div class="bg-green-300 mb-4 text-center">A(z) {{ Session::get('post-created') -> title }} című bejegyzés létrejött!</div>
    @endif

    @if (Session::has('post-updated'))
        <div class="bg-green-300 mb-4 text-center">A(z) {{ Session::get('post-updated') -> title }} című bejegyzés módosult!</div>
    @endif

    @if (Session::has('post-deleted'))
        <div class="bg-green-300 mb-4 text-center">A(z) {{ Session::get('post-deleted') }} című bejegyzés törölve!</div>
    @endif

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
