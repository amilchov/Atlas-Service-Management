<?php

namespace App\Http\Api\Permission\Services;

use App\Http\Api\Role\Repositories\RoleRepository;
use App\Http\Api\User\Repositories\UserRepository;
use App\Http\Api\Permission\Requests\AssignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Permission Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about permissions stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class PermissionService
{
    /**
     * Obtain data for specific user, roles and permissions.
     *
     * @param UserRepository $userRepository
     * @param Request $request
     * @return JsonResponse
     */
    public function permissions(UserRepository $userRepository, Request $request): JsonResponse
    {
        $user = $userRepository->findByToken($request);

        $roles = $user->roles->pluck('id')->toArray();

        $permissions = DB::table('role_has_permissions')
            ->whereIn('role_id', $roles)
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->get(['id', 'name', 'description']);

        if ($permissions && count($permissions) > 0)
        {
            return response()->json(['permissions' => $permissions]);
        }

        return response()->json(['message' => 'User does not have role or / and permissions.']);
    }

    /**
     * Assign role to user with admin authentication.
     *
     * @param AssignRequest $request
     * @param RoleRepository $roleRepository
     * @return JsonResponse
     */
    public function assignPermissionToUser(AssignRequest $request, RoleRepository $roleRepository): JsonResponse
    {
        $validated = $request->validated();

        $role = $roleRepository->findById($validated['role_id']);

        if ($validated && $role)
        {
            $permissions = $validated['permissions'];

            return response()->json($role->givePermissionTo($permissions));
        }

        return response()->json(['message' => 'Unsuccessfully assign permission or permissions to that role user.']);
    }
}
