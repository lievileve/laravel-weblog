@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <h1>Edit post</h1>
    <div>
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title:</label><br>
            <input id="title" name="title" type="text" value="{{ $post->title }}" required><br><br>
            <label for="body">Write your post here.</label><br>
            <textarea id="body" name="body" required>{{ $post->body }}</textarea><br><br>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection