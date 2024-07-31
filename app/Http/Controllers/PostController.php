<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request){
        $categories = Category::has('posts')->get();
        $posts = Post::query();
        $user = Auth::user();

        //This part of the code checks for premium user status
        if ($user->is_premium) {
            $posts = $posts->where(function($query) {
                $query->where('is_premium', true)
                      ->orWhere('is_premium', false);
            });
        } else {
            $posts = $posts->where('is_premium', false);
        }

        //This part of the code applies the category filter
        if ($request->has('category_id') && $request->input('category_id') != '') {
            $categoryId = $request->input('category_id');
            $posts = $posts->whereHas('categories', function($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            });
        }

        $posts = $posts->get()->sortByDesc('created_at');

        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(){
        $categories = Category::all();
        return view('posts.create', compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request){
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        $validated['is_premium'] = $request->has('is_premium');

        // Retrieve and remove the categories from validated data
        $categoryIds = $validated['category_ids'];
        unset($validated['category_ids']);

        //Store the uploaded image to the public directory, if an image is provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }

        // Create the post with the remaining validated data
        $post = Post::create($validated);

        // Attach the categories to the post
        $post->categories()->attach($categoryIds);
        return redirect()->route('posts.index');
    }

    /**
     * Display the selected post
     */
    public function show(Post $post){
        $post->load('comments.user');
        $imageUrl = Storage::url($post->image);        
        return view('posts.show', compact('post', 'imageUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post){
        $categories = Category::all();
        $imageUrl = Storage::url($post->image);    
        return view('posts.edit', compact('post','categories','imageUrl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post){
        $validated = $request->validated();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        
        if ($request->has('delete_image')) {
            if ($post->image) {
                Storage::delete($post->image);
                $post->image = null;
            }
        } 
        
        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('images', 'public');
            
            if ($post->image) {
                Storage::delete($post->image);
            }
            $post->image = $path;
        }
        
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.user');
    }

    public function showUserPosts(){
        $user = Auth::user();
        $posts = $user->posts;
        return view('posts.user_posts', ['posts' => $posts]);
    }
}
