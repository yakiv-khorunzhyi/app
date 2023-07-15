<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/', fn() => view('welcome'));

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('posts/{id}/comments', [CommentController::class, 'getCommentsByPost'])->name('post.comments');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}/comments', [CommentController::class, 'getCommentsByUser'])->name('user.comments');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
