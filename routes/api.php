<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SoftwareController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
    **************************
    APIs Auth
    *******************************
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    **************************
    APIs para CRUD de Services
    *******************************
*/
    // muestra todos los servicios
    Route::get('/service', [ServiceController::class, 'index']);
    // crear un registro de servicios
    Route::post('/service', [ServiceController::class, 'store']);
    // actualizar registro de servicios
    Route::put('/service/{id}', [ServiceController::class, 'update']);
    // eliminar un registro de servicios
    Route::delete('/service/{id}', [ServiceController::class, 'destroy']);

    /*
    **************************
    APIs para CRUD de Software
    *******************************
*/
    // muestra todos los productos de software
    Route::get('/software', [SoftwareController::class, 'index']);
    // crear un registro de software
    Route::post('/software', [SoftwareController::class, 'store']);
    // actualizar registro de software
    Route::put('/software/{id}', [SoftwareController::class, 'update']);
    // eliminar un registro de software
    Route::delete('/software/{id}', [SoftwareController::class, 'destroy']);
});
