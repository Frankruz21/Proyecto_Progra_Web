<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeccionWebController;

//admin
use App\Http\Controllers\Admin\ModuloController;
use App\Http\Controllers\Admin\LeccionController;
use App\Http\Controllers\Admin\RecursoController;

Route::get('/', function () {
    return view('public.home');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('modulos', ModuloController::class);
    Route::resource('lecciones', LeccionController::class)->except(['create']);
    Route::resource('recursos', RecursoController::class)->except(['create', 'show', 'edit', 'update']);
});
