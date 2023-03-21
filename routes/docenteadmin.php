<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColocacionNotasController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\PostController;
// use App\Http\Controllers\Admin\CategoryController;


// no es necesarion poner 'admin' como ruta. 
// Route::get('', [HomeController::class, 'index'])->name('admin.home');

// Route::resource('users', UserController::class)->name('admin.users');
Route::resource('colocacionnotas', ColocacionNotasController::class)->names('docenteadmin.colocacionnotas');//INTERFAZ

// Route::resource('posts', PostController::class)->name('admin.posts');

// Route::resource('categories', CategoryController::class)->name('admin.categories');
