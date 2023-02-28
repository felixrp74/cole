<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;


// no es necesarion poner 'admin' como ruta. 
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::resource('categories', CategoryController::class)->names('admin.categories');
