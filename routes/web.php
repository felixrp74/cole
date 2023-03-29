<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ReporteEstudianteController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ColocacionNotasController;
use App\Http\Controllers\VerAsignacionesController;
use App\Http\Controllers\FichaMatriculaController;
use App\Http\Controllers\ApoderadoController;

Route::resource('estudiante', EstudianteController::class); //INTERFAZ
Route::resource('docente', DocenteController::class); // INTERFAZ
Route::resource('matricula', MatriculaController::class); // INTERFAZ
Route::resource('reportenotas', ReporteEstudianteController::class); //INTERFAZ
Route::resource('asignacion', AsignacionController::class);// INTERFAZ
Route::resource('curso', CursoController::class);//INTERFAZ
Route::resource('colocacionnotas', ColocacionNotasController::class);//INTERFAZ
Route::resource('fichamatricula', FichaMatriculaController::class);
Route::resource('apoderado', ApoderadoController::class);


Route::get('/',  [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get( 'tag/{tag}', [PostController::class, 'tag'] )->name('posts.tag');

Route::get( 'category/{category}', [PostController::class, 'category'] )->name('posts.category');

Route::get( 'mecanica', [PostController::class, 'inicio'] )->name('mecanica.inicio');
Route::get( 'electronica', [PostController::class, 'electronica'] )->name('electronica.inicio');
Route::get( 'sistemas', [PostController::class, 'sistemas'] )->name('sistemas.inicio');
Route::get( 'general', [PostController::class, 'general'] )->name('general.inicio');
Route::get( 'responsable', [PostController::class, 'responsable'] )->name('responsable.inicio');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

