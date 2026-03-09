@extends('layouts.blog')

@section('title', 'Új bejegyzés')

@section('content')
    <h1>Új bejegyzés</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        Cím:<br>
        <input type="text" name="title" value="{{ old('title', '') }}">
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>
        Tartalom:<br>
        <textarea name="content">{{ old('content', '' )}}</textarea>
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror<br>
        Szerző:<br>
        <select name="author_id">
            @foreach($users as $user)
                <option value="{{ $user -> id }}"
                    {{ $user -> id == old('author_id') ? "selected" : "" }}
                >{{ $user -> name }}</option>
            @endforeach
        </select>
        @error('author_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>
        <!--
        <input type="hidden" name="example" value="0">
        <input type="checkbox" name="example" value="1"> Checkbox - csak példa for fun fact
        -->

        <h2>Címkék</h2>

        @foreach($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag -> id }}"
                {{ in_array($tag -> id, old('tags', [])) ? "checked" : ""  }}
            >
            <span style="color: {{ $tag -> color }}">{{ $tag -> name }} </span><br>
        @endforeach
        <br>
        <button class="bg-green-500 text-white p-2 rounded hover:bg-green-600" type="submit">Létrehoz</button>
    </form>

@endsection
