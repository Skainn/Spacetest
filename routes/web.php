<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Маршруты для ресурса PostController
Route::resource('posts', PostController::class);

// Маршруты для ресурса CommentController, вложенные в ресурс постов
Route::resource('posts.comments', CommentController::class)->except(['index', 'create', 'show']);

// Остальные маршруты
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Маршруты для комментариев
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{post}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Маршрут для сохранения поста
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
