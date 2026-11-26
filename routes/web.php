<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LeccionController;
use App\Http\Controllers\Cursos\CursoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

// Certificados del estudiante
Route::get('/certificados-estudiante', function () {
    return view('student.certificados.index');
})->name('student.certificados');

// Facturas del estudiante
Route::get('/facturas-estudiante', function () {
    return view('student.facturas.index');
})->name('student.facturas');

// Perfil del estudiante
Route::get('/perfil-estudiante', function () {
    return view('student.perfil.index');
})->name('student.perfil');

// Vista de prueba de lección administrativa
Route::get('/ver-leccion-admin', function () {
    return view('admin.lecciones.ver_estatica');
});

// Login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1')->name('login.post');

// Registro
Route::get('/registro', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/registro', [RegisterController::class, 'register'])->name('register.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
