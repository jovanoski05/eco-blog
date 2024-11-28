<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

Route::get("/about", function(){
    return view("about");
});

Route::get("/posts", [PostController::class, 'index']);

Route::get("/posts/{id}", [PostController::class, 'show']);

Route::get("/register", [UserController::class, 'register']);

Route::post("/register", [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'create']);

Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');


#API

