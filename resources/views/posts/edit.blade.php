@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <h1>Edit post</h1>
        <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Title:</label><br>
            <input id="title" class="post_text" name="title" type="text" value="{{ $post->title }}" required><br><br>
            <label for="body">Write your post here.</label><br>
            <textarea id="body" name="body" required>{{ $post->body }}</textarea><br><br>
            <div id="post_image">
                @if ($post->image)
                    <label>Current Image:</label><br>
                    <img src="{{ asset($imageUrl) }}" class="thumbnail"><br>

                    
                    <label for="delete_image">Check this box to delete the current image without uploading a new one</label>
                    <input type="hidden" name="delete_image" value="0">
                    <input type="checkbox" name="delete_image" id="delete_image" value="1"><br><br>
                    
                    <label>Upload an image to replace the original one here:</label>
                    <input type="file" name="image" id="image"><br><br><br>  

                @else
                    <label for="image">Add an Image</label><br>
                    <input type="file" name="image" id="image"><br><br><br> 
                @endif
            </div>

            <button type="submit">Update</button>
        </form>


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