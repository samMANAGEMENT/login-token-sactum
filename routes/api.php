<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
  
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

require __DIR__ . '/Mesas/Mesas.php';
require __DIR__ . '/Platos/Platos.php';
require __DIR__ . '/Orden/Orden.php';
require __DIR__ . '/Reservas/Reservas.php';