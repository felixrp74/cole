<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ReporteEstudianteController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ColocacionNotasController;
use App\Http\Controllers\VerAsignacionesController;
use App\Http\Controllers\FichaMatriculaController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\Admin\UserController;

Route::resource('estudiante', EstudianteController::class); //INTERFAZ
Route::resource('docente', DocenteController::class); // INTERFAZ
Route::resource('matricula', MatriculaController::class); // INTERFAZ
Route::resource('reportenotas', ReporteEstudianteController::class); //INTERFAZ
Route::resource('asignacion', AsignacionController::class);// INTERFAZ
Route::resource('curso', CursoController::class);//INTERFAZ
Route::resource('colocacionnotas', ColocacionNotasController::class);//INTERFAZ
Route::resource('fichamatricula', FichaMatriculaController::class);
Route::resource('apoderado', ApoderadoController::class);

Route::resource('users', UserController::class)->names('admin.users');


Route::get('/',  [PostController::class, 'index'])->name('posts.index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/reporte_estudiante_padre', [EstudianteController::class, 'reporte_estudiante_padre'])->name('reporte_estudiante_padre');
Route::get('/reporte_estudiante_matriculado', [MatriculaController::class, 'reporte_estudiante_matriculado'])->name('reporte_estudiante_matriculado');
Route::get('/reporte_docente_asignado', [AsignacionController::class, 'reporte_docente_asignado'])->name('reporte_docente_asignado');
Route::get('/reporte_docente_estudiantes', [AsignacionController::class, 'reporte_docente_estudiantes'])->name('reporte_docente_estudiantes');

Route::get('/imprimir_docentes', [DocenteController::class, 'imprimir_docentes'])->name('imprimir_docentes');
Route::get('/imprimir_estudiantes', [EstudianteController::class, 'imprimir_estudiantes'])->name('imprimir_estudiantes');
Route::get('/imprimir_apoderados', [ApoderadoController::class, 'imprimir_apoderados'])->name('imprimir_apoderados');