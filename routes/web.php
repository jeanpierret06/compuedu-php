<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\ProgramaController;
use App\Http\Controllers\Employee\SolicitudController;
use App\Http\Controllers\Employee\UsuarioController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('solicitud',SolicitudController::class)
->names('solicitud');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('programa',ProgramaController::class)
->names('programa');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('usuario',UsuarioController::class)
->names('usuario');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
