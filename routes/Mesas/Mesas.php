<?php

use App\Http\Mod\Mesas\Controller\MesasController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('mesas')->group(function () {
    Route::post('CrearMesas', [MesasController::class, 'CrearMesas']);
    Route::get('ListarMesas', [MesasController::class, 'ListarMesas']);
    Route::put('{id}', [MesasController::class, 'EditarMesa']);
    Route::delete('EliminarUser /{id}', [MesasController::class, 'eliminarUser']);
});

