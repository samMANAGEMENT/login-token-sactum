<?php

use App\Http\Mod\Reserva\Controller\ReservaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('reserva')->group(function () {
    Route::post('CrearReserva', [ReservaController::class, 'CrearReserva']);
    Route::get('ListarReservas', [ReservaController::class, 'ListarReservas']);
    Route::put('{id}', [ReservaController::class, 'EditarReserva']);
    Route::delete('EliminarUser /{id}', [ReservaController::class, 'eliminarUser']);
});

