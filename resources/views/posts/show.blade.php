@extends('layouts.app')

@section('title', 'View Post')

@section('content')
    <div class="post">
        <h1>{{ $post->title }}</h1>
            <div class="post_body">
                {{ $post->body }}
            <br><br>
                @if ($post->image)
                    <img src="{{ asset($imageUrl) }}" class="post_image">
                @endif
            </div>
            <p class="timestamp">Created At {{ $post->created_at->format('d M Y H:i') }}</p>
            <p class="timestamp">Updated at {{ $post->updated_at->format('d M Y H:i') }}</p>
    </div>
    
    <div class="comments">
        <div class="comment_list">
            <h2>Comments</h2>
                <div class="comments-container">
                    @foreach ($post->comments as $comment)
                        <div class="comment">
                            <p>{{ $comment->body }}</p>
                            <span>Posted by: {{ $comment->user->username }}</span>
                        </div>
                    @endforeach
                </div>
        </div>

        <div id="comment_box">
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="body">Add a Comment</label><br>
                        <textarea id="body" name="body" class="form-control" required></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
        
@endsection