<?php

namespace App\Http\Api\Role\Services;

use App\Http\Api\User\Resources\UserResource;
use App\Http\Api\Role\Requests\AssignRequest;
use App\Http\Api\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Role Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about roles stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleService
{
    /**
     * Assign role to user with admin authentication.
     *
     * @param AssignRequest $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function assignRoleToUser(AssignRequest $request, UserRepository $userRepository): JsonResponse
    {
        $validated = $request->validated();

        $user = $userRepository->findById($validated['user_id']);

        if ($validated && $user)
        {
            $roles = $validated['roles'];

            $user->assignRole($roles);

            return response()->json(new UserResource($user));
        }

        return response()->json(['message' => 'Unsuccessfully assign role or roles to the user.']);
    }
}
