<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GaleryController;
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

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
    
    Route::prefix('galery')->group(function () {
        Route::get('/', [GaleryController::class, 'index']);
        Route::post('/', [GaleryController::class, 'store']);
        Route::get('/{id}', [GaleryController::class, 'show']);
        Route::patch('/{id}', [GaleryController::class, 'update']);
        Route::delete('/{id}', [GaleryController::class, 'destroy']);
    });
});