<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

Route::get("/posts", [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create'])->withoutMiddleware('auth');
Route::post('/posts/create', [PostController::class, 'store'])->withoutMiddleware('auth');
Route::post('/api/posts/create', [PostController::class, 'apistore']);

Route::get("/posts/{id}", [PostController::class, 'show']);
Route::delete("/posts/{id}", [PostController::class, 'destroy']);

Route::get("/register", [UserController::class, 'register']);

Route::post("/register", [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'create']);

Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/getapi', [UserController::class, 'getapi']);


#API

