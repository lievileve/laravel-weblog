@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create new post</h1>
    <div>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label><br>
            <input id="title" name="title" type="text" required><br><br>
            <label for="body">Write your post here.</label><br>
            <textarea id="body" name="body" required></textarea><br><br>
            <label for="image">Upload Image:</label><br>
            <input type="file" name="image" id="image"><br><br><br>            
            <label for="categories">Select up to three categories here or add a new one</label><br>
            <select id="categories" name="category_ids[]" size=4 multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select><br><br>
            <label for="is_premium">Mark as premium content</label>
            <input type="checkbox" id="is_premium" name="is_premium" value="1"><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
             <ul>   {{ $error }} </ul>
            @endforeach
        </ul>
    </div>
    @endif


@endsection