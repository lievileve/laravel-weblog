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
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
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
