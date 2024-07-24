@extends('layouts.app')

@section('title', 'View Post')

@section('content')
    <div class="container" id="post">
        <h1>{{ $post->title }}</h1>
            <div id="post_body">
                {{ $post->body }}
            </div>
            <div id="post_image">
                @if ($post->image)
                    <img src="{{ asset($imageUrl) }}">
                @endif
            </div>
            <p>Created At {{ $post->created_at->format('d M Y H:i') }}</p>
            <p>Updated at {{ $post->updated_at->format('d M Y H:i') }}</p><br>
    </div>

    <div class="container" id="comment_list">
        <h2>Comments</h2>
            <ul>
                @foreach ($post->comments as $comment)
                    <li>{{ $comment->body }} - 
                    <span>Posted by: {{ $comment->user->username }}</span>
                    </li>
                @endforeach
            </ul>
    </div>

    <div class="container" id="comment_box">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="body">Add a Comment</label><br>
                    <textarea id="body" name="body" class="form-control" required></textarea>
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
    
@endsection