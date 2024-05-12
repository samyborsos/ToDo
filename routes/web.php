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
    Route::get('/todos/filterCategory', [TodoController::class, 'filterCategory']);
    Route::get('/todos/filterTitle', [TodoController::class, 'filterTitle']);
    Route::get('/todos/filterDeadline', [TodoController::class, 'filterDeadline']);


    Route::get('/todos', [TodoController::class, 'index']);

    Route::get('/todos/create', [TodoController::class, 'create']);

    Route::post('/todos', [TodoController::class, 'store']);

    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])
    ->can('edit-todo', 'todo');

    Route::patch('todos/{todo}', [TodoController::class, 'update'])
    ->can('edit-todo', 'todo');

    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
    ->can('edit-todo', 'todo');

});
Route::get('/todos/{todo}', [TodoController::class, 'show']);

Route::get('/users/{user}', [UserController::class, 'show'])
    ->can('edit-user','user');

Route::get('/users/{user}/stats', [UserController::class, 'stats'])
    ->can('edit-user','user');



Route::post('/users', [UserController::class, 'store']);

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->can('edit-user', 'user');

    Route::patch('users/{user}', [UserController::class, 'update'])
    ->can('edit-user', 'user');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->can('edit-user', 'user');

//Auth

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


