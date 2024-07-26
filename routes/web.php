<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Routes for blog posts and related resources
Route::group(['middleware' => 'auth'], function () {

    //Post routes
    Route::resource('posts', PostController::class)->except(['show']);
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

    //User posts
    Route::get('my-posts', [PostController::class, 'showUserPosts'])->name('posts.user'); 

    //Comment route
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    //Category routes
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('categories/{category}/posts', [CategoryController::class, 'posts'])->name('categories.posts');
});

//Routes for users
Route::post('/user/premium-status', [UserController::class, 'togglePremiumStatus'])->name('user.togglePremiumStatus');

//Authentication routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('login', [LoginController::class, 'authenticate'])->name('login'); 
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); 

    
//List of old routes, to be deleted later if my new approach works
// Route::get('/', [PostController::class, 'index'])->name('posts.index'); //Show list of all posts
// Route::get('my-posts', [PostController::class, 'showUserPosts'])->name('posts.user'); //Show posts belonging to user currently logged in   
// Route::get('/create', [PostController::class, 'create'])->name('posts.create'); // Show form to create a new post
// Route::post('/', [PostController::class, 'store'])->name('posts.store'); // Store a new post
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');// View a single post
// Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Show form to edit a post
// Route::put('/{post}', [PostController::class, 'update'])->name('posts.update'); // Update an existing post
// Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // Delete a post    
// Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');//Post a comment on a blog post
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); // Show list of categories
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');//Create new category
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');//Store new category
// Route::get('categories/{category}/posts', [CategoryController::class, 'posts'])->name('categories.posts');//Show list of posts per selected category