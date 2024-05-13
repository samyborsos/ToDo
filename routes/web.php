<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');





Route::middleware('auth')->group(function () {

    Route::get('/todos/search', [TodoController::class, 'search']);

    Route::get('/todos/filter', [TodoController::class, 'filter']);

    Route::get('/todos', [TodoController::class, 'index']);

    Route::get('/todos/create', [TodoController::class, 'create']);

    Route::post('/todos', [TodoController::class, 'store']);

        Route::middleware('can:edit-todo,todo')->group(function() {

            Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);

            Route::patch('todos/{todo}', [TodoController::class, 'update']);

            Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);

            Route::get('/todos/{todo}', [TodoController::class, 'show']);
        });
});


Route::middleware(['auth', 'can:edit-user,user'])->group(function () {

    Route::get('/users/{user}', [UserController::class, 'show']);

    Route::get('/users/{user}/stats', [UserController::class, 'stats']);

    Route::get('/users/{user}/edit', [UserController::class, 'edit']);

    Route::patch('users/{user}', [UserController::class, 'update']);

    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});


Route::post('todos/{todo}/comments', [CommentController::class, 'store']);


//Auth

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
