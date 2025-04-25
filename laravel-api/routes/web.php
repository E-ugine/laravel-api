<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [UserController::class , 'register']);
Route::post('/logout', [UserController::class , 'logout']);
Route::post('/login', [UserController::class, 'login'])->name('login');

//Blog related routes
Route::post('/create-post',[PostController::class,'createPost'])->middleware('auth:web');



   