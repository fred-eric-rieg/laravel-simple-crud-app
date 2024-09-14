<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    $posts = [];
    if (Auth::check()) {
        $posts = Auth::user()->posts()->orderBy('id', 'asc')->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    $users = User::all();
    return view('login', ['users' => $users]);
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);

