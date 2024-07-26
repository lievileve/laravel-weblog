@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <h1>Edit post</h1>
    <div>
        <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Title:</label><br>
            <input id="title" name="title" type="text" value="{{ $post->title }}" required><br><br>
            <label for="body">Write your post here.</label><br>
            <textarea id="body" name="body" required>{{ $post->body }}</textarea><br><br>
            <div id="post_image">
                @if ($post->image)
                    <label>Current Image:</label><br>
                    <img src="{{ asset($imageUrl) }}"><br>

                    
                    <label for="delete_image">Check this box to delete the current image</label>
                    <input type="checkbox" name="delete_image" id="delete_image"><br><br>
                    
                    <label>Upload an image to replace the original one here:</label>
                    <input type="file" name="image" id="image"><br><br><br>  

                @else
                    <label for="image">Add an Image</label><br>
                    <input type="file" name="image" id="image"><br><br><br> 
                @endif
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
@endsection