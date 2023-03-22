<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DocenteController;
// use App\Http\Controllers\Admin\CategoryController;


// no es necesarion poner 'admin' como ruta. 
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->names('admin.users');


Route::resource('estudiante', EstudianteController::class)->names('admin.estudiante');
Route::resource('docente', DocenteController::class)->names('admin.docente');
Route::resource('matricula', MatriculaController::class)->names('admin.matricula');
Route::resource('reportenotas', ReporteEstudianteController::class)->names('admin.reportenotas');
Route::resource('asignacion', AsignacionController::class)->names('admin.asignacion');
Route::resource('curso', CursoController::class)->names('admin.curso');
Route::resource('colocacionnotas', ColocacionNotasController::class)->names('admin.colocacionnotas');
