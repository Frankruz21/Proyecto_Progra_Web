<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LeccionController;

Route::get('/', function () {
    return view('welcome'); 
});

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //  Módulos
    Route::resource('modulos', ModuloController::class)->except(['create']);
    
    // Para cargar el contenido del módulo vía AJAX 
    Route::get('modulos/{modulo}/contenido', [ModuloController::class, 'contenido'])->name('modulos.contenido');

    // Lecciones
    Route::resource('lecciones', LeccionController::class)->except(['create']);
});

Route::get('/aula-prueba', function () {
    return view('student.aula.show');
})->name('aula.prueba');

Route::get('/ver-leccion-admin', function () {
    return view('admin.lecciones.ver_estatica');
});