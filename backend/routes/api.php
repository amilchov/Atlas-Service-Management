<?php

use App\Http\Api\Auth\Controllers\AuthenticationController;
use App\Http\Api\Chart\Controllers\ChartController;
use App\Http\Api\Role\Controllers\RoleController;
use App\Http\Api\User\Controllers\UserController;
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
    Route::get('/charts', [ChartController::class, 'charts']);

    // Users Routes
    Route::get('/users', [UserController::class, 'users']);

    // Roles Routes
    Route::get('/roles', [RoleController::class, 'roles']);
});
