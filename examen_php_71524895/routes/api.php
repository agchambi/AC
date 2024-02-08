<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\Reportes;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Rutas
Route::apiResource('autor', AutorController::class);
Route::apiResource('libros', LibroController::class);
Route::apiResource('cliente', ClienteController::class);
Route::apiResource('prestamos', PrestamosController::class);

//Rutas Logica de Negocio

Route::get('/reportes/prestamos-por-mes', [Reportes::class, 'prestamosPorMes']);
Route::get('/reportes/prestamos-por-semana', [Reportes::class, 'prestamosPorSemana']);
Route::get('/reportes/libros-prestados-mes-actual', [Reportes::class, 'librosPrestadosMesActual']);
Route::get('/reportes/libros-prestados-semana-actual', [Reportes::class, 'librosPrestadosSemanaActual']);
Route::get('/reportes/total-libros', [Reportes::class, 'totalLibros']);
