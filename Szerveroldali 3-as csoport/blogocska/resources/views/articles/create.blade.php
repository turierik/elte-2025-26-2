@extends('layouts.main')

@section('title', 'Új cikk írása')

@section('content')
    <h1>Új cikk írása</h1>
    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        Cím: <br>
        <input type="text" name="title" value="{{ old('title', '') }}">
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>
        Tartalom: <br>
        <div id="editor"></div>
        <input type="hidden" id="content" name="content">
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        Kép:
        <input type="file" name="image">
        @error('image')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br><br>

        {{-- Szerző: <br>
        <select name="author_id">
            @foreach($users as $user)
                <option value="{{ $user -> id }}"
                    {{$user -> id == old('author_id', -1) ? "selected" : "" }}
                >{{ $user -> name }}</option>
            @endforeach
        </select>
        @error('author_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror --}}
        <br>
        <!-- Side note: checkbox egyszerűen :)
            <input type="hidden" name="example" value="0">
            <input type="checkbox" name="example" value="1">
        -->
        <h2>Kategóriák</h2>
        @foreach($categories as $cat)
            <input type="checkbox" name="categories[]" value="{{ $cat -> id }}"
                {{ in_array($cat -> id, old('categories', [])) ? "checked" : ""}}
            >
            <span style="color: {{ $cat -> color }}"> {{ $cat -> title }}</span><br>
        @endforeach

        <button type="submit" class="bg-cyan-600 text-white p-2 rounded-xl mt-4 hover:bg-cyan-700">Létrehoz</button>
    </form>
    <script type="module">
        const editor = window.pell.init({
            element: document.getElementById('editor'),
            onChange: (html) => document.getElementById('content').value = html
        })
        editor.content.innerHTML = '{!! old('content', '') !!}';
    </script>
@endsection
