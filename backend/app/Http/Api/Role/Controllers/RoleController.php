<?php

namespace App\Http\Api\Role\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Api\Role\Services\RoleService;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Role Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in whose we have
| the basic role data from the Role Service.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleController extends Controller
{
    /**
     * Call the method for roles from the service class.
     *
     * @param RoleService $roleService
     * @return JsonResponse
     */
    public function roles(RoleService $roleService): JsonResponse
    {
        return $roleService->roles();
    }
}
