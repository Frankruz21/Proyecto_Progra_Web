<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecursoApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/lecciones/{leccion_id}/recursos', [RecursoApiController::class, 'index']);
Route::post('/recursos', [RecursoApiController::class, 'store']);
Route::delete('/recursos/{id}', [RecursoApiController::class, 'destroy']);