<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Homepage (List of Posts)
Route::get('/', [PostController::class, 'index'])->name('posts.index'); 

// Create Post Form
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Store New Post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Show Single Post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Edit Post Form
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Update Existing Post
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Delete Post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
