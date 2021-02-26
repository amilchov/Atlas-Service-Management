<?php

use App\Http\Api\Authentication\Controllers\AuthenticationController;
use App\Http\Api\Chart\Controllers\ChartController;
use App\Http\Api\Incident\Controllers\IncidentController;
use App\Http\Api\Permission\Controllers\PermissionController;
use App\Http\Api\Role\Controllers\RoleController;
use App\Http\Api\User\Controllers\UserController;
use App\Http\Api\Team\Controllers\TeamController;

// Application Programming Interface (API) routes
Route::group(['namespace' => 'App\Http\Api'], function() {
    // Authentication Routes
    Route::group(['prefix' => 'auth'], function() {
        Route::post('/login', [AuthenticationController::class, 'login']);
        Route::post('/register', [AuthenticationController::class, 'register']);
    });

    // Admin Routes
    Route::group(['middleware' => 'auth.admin'], function() {
        Route::group(['prefix' => 'admin'], function() {
            // Roles Routes
            Route::group(['prefix' => 'role'], function() {
                Route::post('assign', [RoleController::class, 'assign']);
            });

            // Permissions Routes
            Route::group(['prefix' => 'permissions'], function() {
                Route::post('assign', [PermissionController::class, 'assign']);
            });
        });
    });

    // Users Routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UserController::class, 'index']);
        Route::get('{id}', [UserController::class, 'show']);

        Route::group(['middleware' => 'auth.token'], function() {
            Route::match(['PUT', 'PATCH'], 'update', [UserController::class, 'update']);
            Route::delete('delete', [UserController::class, 'destroy']);
        });
    });

    // Charts Routes
    Route::group(['prefix' => 'charts'], function() {
        Route::get('/', [ChartController::class, 'index']);
        Route::get('{id}', [ChartController::class, 'show']);
    });

    // Roles Routes
    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', [RoleController::class, 'index']);
    });

    // Permissions Routes
    Route::group(['prefix' => 'permissions', 'middleware' => 'auth.token'], function() {
        Route::get('/', [PermissionController::class, 'index']);
    });

    // Teams Routes
    Route::group(['prefix' => 'teams', 'middleware' => 'auth.admin'], function() {
        Route::get('/', [TeamController::class, 'index']);
        Route::post('create', [TeamController::class, 'store']);

        Route::group(['prefix' => '{team_id}'], function() {
            Route::get('/', [TeamController::class, 'show']);
            Route::match(['PUT', 'PATCH', 'POST'], 'update', [TeamController::class, 'update']);
            Route::delete('delete', [TeamController::class, 'destroy']);
            Route::post('invite', [TeamController::class, 'invite']);
            Route::post('roles', [TeamController::class, 'roles']);
        });
    });

    // Incidents Routes
    Route::group(['prefix' => 'incidents'], function() {
        Route::group(['middleware' => 'auth.token'], function() {
            Route::get('user', [IncidentController::class, 'user']);
            Route::post('create', [IncidentController::class, 'store']);
            Route::match(['PUT', 'PATCH'], '{incident_id}/update', [IncidentController::class, 'update']);
        });

        Route::group(['middleware' => 'auth.admin'], function() {
            Route::get('/', [IncidentController::class, 'index']);
            Route::get('/{incident_id}', [IncidentController::class, 'show']);
            Route::delete('{incident_id}/delete', [IncidentController::class, 'destroy']);
        });
    });
});
