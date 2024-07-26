<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store comment on post
     */
    public function store(StoreCommentRequest $request, Post $post){
        $validated = $request->validated();

        $post->comments()->create([
            'body' => $validated['body'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.show', $post);
    }

}
