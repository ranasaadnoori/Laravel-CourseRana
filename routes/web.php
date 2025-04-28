<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginRegisterController;


Route::get('/', function () {
    return view('welcome');
});

// Guest routes
Route::middleware('guest')->controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});


// Authenticated routes
Route::middleware('auth')->controller(LoginRegisterController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');


Route::resource('posts', PostController::class);
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{post}/comments', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/posts/{post}/comments',[CommentController::class, 'update'])->name ('comments.update');
Route::delete('/posts/{post}/comments', CommentController::class .'@destroy')->name('comments.destroy');

});




