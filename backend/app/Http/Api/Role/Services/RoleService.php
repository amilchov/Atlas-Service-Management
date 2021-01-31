<?php

namespace App\Http\Api\Role\Services;

use App\Http\Api\Role\Resources\Collections\RoleCollection;
use Spatie\Permission\Models\Role;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Role Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in whose we are getting
| the full data about roles stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleService
{
    /**
     * Obtain the all data for roles.
     *
     * @return JsonResponse
     */
    public function roles() : JsonResponse
    {
        $roles = Role::all();

        return response()->json(new RoleCollection($roles));
    }
}
