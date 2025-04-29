<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;;
use App\Http\Controllers\Auth\LoginRegisterController;

// Registration route
Route::post('/register', [LoginRegisterController::class, 'apiStore']);

// Login route
Route::post('/login', [LoginRegisterController::class, 'apiAuthenticate']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Posts API
Route::get('/posts', [PostController::class, 'apiIndex']);
Route::get('/posts/{id}', [PostController::class, 'apiShow']);
Route::post('/posts', [PostController::class, 'apiStore']);
Route::put('/posts/{id}', [PostController::class, 'apiUpdate']);
Route::delete('/posts/{id}', [PostController::class, 'apiDestroy']);

// Comments API
Route::post('/posts/{postId}/comments', [CommentController::class, 'apiStore']);