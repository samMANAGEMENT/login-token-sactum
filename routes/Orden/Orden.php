<?php

use App\Http\Mod\Ordenes\Controller\OrdenesController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('orden')->group(function () {
    Route::post('CrearOrden', [OrdenesController::class, 'CrearOrden']);
    Route::get('ListarOrdenes', [OrdenesController::class, 'ListarOrdenes']);
    Route::put('{id}', [OrdenesController::class, 'EditarOrden']);
    Route::delete('EliminarUser /{id}', [OrdenesController::class, 'eliminarUser']);
});

