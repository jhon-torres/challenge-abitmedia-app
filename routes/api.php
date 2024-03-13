<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// muestra todos los registros
Route::get('/software', [SoftwareController::class, 'index']);

// crear un registro
Route::post('/software', [SoftwareController::class, 'store']);

// actualizar registro
Route::put('/software/{id}', [SoftwareController::class, 'update']);

// eliminar un registro
Route::delete('/software/{id}', [SoftwareController::class, 'destroy']);
