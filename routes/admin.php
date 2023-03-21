<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DocenteController;
// use App\Http\Controllers\Admin\CategoryController;


// no es necesarion poner 'admin' como ruta. 
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('docente', DocenteController::class)->names('admin.docente');

Route::resource('categories', CategoryController::class)->names('admin.categories');
