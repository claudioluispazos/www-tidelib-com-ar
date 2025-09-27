<?php

use App\Http\Controllers\Api\GeneroController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\AutorController as ApiAutorController;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::apiResource('libros', LibroController::class);
Route::apiResource('generos', GeneroController::class);
Route::get('libros/por-autor/{autorId}', [LibroController::class, 'listByAutor']);
Route::get('mis-libros', [LibroController::class, 'myBooks'])->middleware('auth:sanctum');

// Onboarding de autores
Route::prefix('autores')->group(function () {
    Route::post('/become', [ApiAutorController::class, 'become']);
});

// Rutas para autenticación
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerificationEmail'])
        ->name('verification.send');
    Route::post('/email/verify', [AuthController::class, 'verifyEmailWithCode']);
});


