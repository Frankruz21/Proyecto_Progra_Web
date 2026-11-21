<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LeccionController;
use App\Http\Controllers\Cursos\CursoController;

Route::get('/', function () {
    return view('welcome'); 
});

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //CURSOS
    Route::resource('cursos', CursoController::class)->except(['create']);
    Route::get('mis-cursos', [CursoController::class, 'index'])->name('cursos.instructor');

    //MODULOS
    Route::resource('modulos', ModuloController::class)->except(['create']);
    Route::get('modulos/{modulo}/contenido', [ModuloController::class, 'contenido'])->name('modulos.contenido');

    // LECCIONES
    Route::resource('lecciones', LeccionController::class)->except(['create']);
});

// Rutas de prueba o públicas
Route::get('/aula-prueba', function () {
    return view('student.aula.show');
})->name('aula.prueba');

Route::get('/ver-leccion-admin', function () {
    return view('admin.lecciones.ver_estatica');
});