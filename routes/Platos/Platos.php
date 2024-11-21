<?php

use App\Http\Mod\Platos\Controller\PlatosController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('platos')->group(function () {
    Route::post('CrearPlatos', [PlatosController::class, 'CrearPlatos']);
    Route::get('ListarPlatos', [PlatosController::class, 'ListarPlatos']);
    Route::put('{id}', [PlatosController::class, 'EditarPlato']);
    Route::delete('EliminarUser /{id}', [PlatosController::class, 'eliminarUser']);
});

