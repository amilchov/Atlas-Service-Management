<?php

use App\Http\Api\Administrator\Controllers\AdministratorController;
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
        Route::post('login', [AuthenticationController::class, 'login']);
        Route::post('register', [AuthenticationController::class, 'register']);
    });

    // Administrator Routes
    Route::group(['middleware' => 'auth.admin', 'prefix' => 'administrator'], function() {
        // Users Routes
        Route::group(['prefix' => 'users/{id}'], function() {
            Route::post('update', [AdministratorController::class, 'updateUser']);
            Route::delete('delete', [AdministratorController::class, 'destroyUser']);
        });

        // Roles Routes
        Route::group(['prefix' => 'roles'], function() {
            Route::post('assign', [RoleController::class, 'assign']);
        });

        // Permissions Routes
        Route::group(['prefix' => 'permissions'], function() {
            Route::post('assign', [PermissionController::class, 'assign']);
        });
    });

    // Users Routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UserController::class, 'index']);
        Route::get('{id}', [UserController::class, 'show']);

        Route::group(['middleware' => 'auth.token'], function() {
            Route::post('update', [UserController::class, 'update']);
            Route::delete('delete', [UserController::class, 'destroy']);
        });
    });

    // Charts Routes
    Route::group(['prefix' => 'charts'], function() {
        Route::get('/', [ChartController::class, 'index']);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [ChartController::class, 'show']);
            Route::get('data', [ChartController::class, 'data']);
        });
    });

    // Roles Routes
    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('{id}', [RoleController::class, 'show']);
    });

    // Permissions Routes
    Route::group(['prefix' => 'permissions', 'middleware' => 'auth.token'], function() {
        Route::get('/', [PermissionController::class, 'index']);
    });

    // Teams Routes
    Route::group(['prefix' => 'teams'], function() {
        Route::get('user', [TeamController::class, 'user'])->middleware('auth.token');

        Route::group(['middleware' => 'auth.admin'], function() {
            Route::get('/', [TeamController::class, 'index']);
            Route::post('create', [TeamController::class, 'store']);

            Route::group(['prefix' => '{team_id}'], function() {
                Route::get('/', [TeamController::class, 'show']);
                Route::post('update', [TeamController::class, 'update']);
                Route::post('invite', [TeamController::class, 'inviteMember']);
                Route::post('remove', [TeamController::class, 'removeMember']);
                Route::post('incidents', [TeamController::class, 'assignIncidents']);
                Route::post('incidents/remove', [TeamController::class, 'removeIncidents']);
                Route::post('roles', [TeamController::class, 'assignRoles']);
                Route::post('roles/remove', [TeamController::class, 'removeRoles']);
                Route::delete('delete', [TeamController::class, 'destroy']);
            });
        });
    });

    // Incidents Routes
    Route::group(['prefix' => 'incidents'], function() {
        Route::group(['middleware' => 'auth.token'], function() {
            Route::get('user', [IncidentController::class, 'user']);
            Route::post('{incident_id}/update', [IncidentController::class, 'update']);
        });

        Route::post('create', [IncidentController::class, 'store']);

        Route::group(['middleware' => 'auth.admin'], function() {
            Route::get('/', [IncidentController::class, 'index']);

            Route::group(['prefix' => '{incident_id}'], function() {
                Route::get('/', [IncidentController::class, 'show']);
                Route::delete('delete', [IncidentController::class, 'destroy']);
            });
        });
    });
});
