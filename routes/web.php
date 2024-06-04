<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::get('/getPostsByTag', [App\Http\Controllers\PostController::class, 'getPostsByTag'])->name('getPostsByTag');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginView'])->name('loginView');
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'registerView'])->name('registerView');

    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
});

