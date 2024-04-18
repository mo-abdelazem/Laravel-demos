<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::resource('posts', PostsController::class);
Route::resource('comments', CommentsController::class);
Auth::routes();

Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/', [PostsController::class, 'index'])->name('home');