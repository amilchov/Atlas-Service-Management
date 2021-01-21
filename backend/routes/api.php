<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Chart\ChartController;
use Illuminate\Support\Facades\Route;

// Application Programming Interface (API) routes
Route::group(['namespace' => 'Api'], function() {
    // Authentication Routes
    Route::group(['prefix' => 'auth'], function() {
        Route::post('/login', [AuthenticationController::class, 'login']);
        Route::post('/register', [AuthenticationController::class, 'register']);

        Route::middleware('verify_api_token')->group(function () {
            Route::patch('/update', [AuthenticationController::class, 'update']);
        });
    });

    // Chart Routes
    Route::post('/charts', [ChartController::class, 'charts']);
});
