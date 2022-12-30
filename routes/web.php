<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'welcome'])
    ->name('welcome');

Route::get('/posts', [App\Http\Controllers\PageController::class, 'post'])
    ->name('all.post');

Route::get('/post/detail/{slug}', [App\Http\Controllers\PageController::class, 'post_detail'])
    ->name('post.detail');

Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])
    ->name('contact');

Auth::routes([
    'register' => false,
    'reset'    => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::resource('/profile', App\Http\Controllers\ProfileController::class)
        ->only(['index', 'store']);

    Route::resource('/post', App\Http\Controllers\PostController::class)
        ->except(['show']);

    Route::resource('/information', App\Http\Controllers\InformationController::class)
        ->only(['index', 'store']);
});
