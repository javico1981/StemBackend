<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EncuestaController;

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

Route::prefix('user')->group(function () {
    Route::post('login', [UserController::class, 'log']);
    Route::post('register', [UserController::class, 'register']);
    Route::put('{id}', [UserController::class, 'update']);
});

Route::prefix('encuesta')->group(function () {
    Route::post('', [EncuestaController::class, 'store']);
    Route::get('', [EncuestaController::class, 'getEncuestas']);
    Route::get('dashboard', [EncuestaController::class, 'getDashboard']);
    Route::delete('{id}', [EncuestaController::class, 'delete']);
});
