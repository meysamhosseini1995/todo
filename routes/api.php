<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::prefix('auth')->group(function () {
    Route::prefix('user')->controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::get('/info', 'getInfoUser');
    });
});



Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::group(['prefix' => 'application', 'namespace' => 'Application'], function () {
        Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
            Route::apiResource('todo', 'TodoController');
        });
    });
});

