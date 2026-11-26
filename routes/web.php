<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LeccionController;
use App\Http\Controllers\Cursos\CursoController;
use App\Http\Controllers\Aula\AulaController;



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
    Route::resource('lecciones', LeccionController::class)
        ->except(['create'])
        ->parameters(['lecciones' => 'leccion']);

    //zaula
    Route::get('/aula/{curso_id}/{leccion_id?}', [AulaController::class, 'show'])
        ->name('aula.show');
});

// Rutas de prueba o públicas
Route::get('/aula-prueba', function () {
    return view('student.aula.show');
})->name('aula.prueba');

// Dashboard de estudiante
Route::get('/dashboard-estudiante', function () {
    return view('student.dashboard');
})->name('student.dashboard');

// Mis cursos del estudiante
Route::get('/mis-cursos-estudiante', function () {
    return view('student.cursos.index');
})->name('student.cursos');

// Recursos del estudiante
Route::get('/recursos-estudiante', function () {
    return view('student.recursos.index');
})->name('student.recursos');

// Vista de prueba de lección administrativa
Route::get('/ver-leccion-admin', function () {
    return view('admin.lecciones.ver_estatica');
});
// Página de inicio
Route::get('/', function () {
    return view('public.home');
})->name('home');

// Inicio de sesión
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Registro de usuarios
Route::get('/registro', function () {
    return view('auth.register');
})->name('register');