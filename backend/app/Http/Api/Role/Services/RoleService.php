<?php

namespace App\Http\Api\Role\Services;

use App\Http\Api\Role\Resources\Collections\RoleCollection;
use App\Http\Api\Role\Resources\RoleResource;
use App\Http\Api\User\Models\User;
use App\Http\Api\User\Resources\UserResource;
use App\Http\Api\Role\Requests\AssignRoleRequest;
use App\Http\Api\Role\Interfaces\RoleRepositoryInterface;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
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
     * Initializing the instance of Role Repository interface.
     *
     * @var RoleRepositoryInterface
     */
    private RoleRepositoryInterface $roleRepository;

    /**
     * RoleService constructor.
     *
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Call the method for obtain all roles from the repository class.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $roles = $this->roleRepository->all();

        return response()->json(new RoleCollection($roles));
    }

    /**
     * Show the incident with the specific id.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $role = $this->roleRepository->findById($id);

        return response()->json(new RoleResource($role));
    }

    /**
     * Assign role to user with admin authentication.
     *
     * @param AssignRoleRequest $request
     * @param UserRepositoryInterface $userRepository
     * @return JsonResponse
     */
    public function assignRoleToUser(AssignRoleRequest $request, UserRepositoryInterface $userRepository): JsonResponse
    {
        $validated = $request->validated();

        $user = $userRepository->findById($validated['user_id']);
        $userClass = User::class;

        if ($validated && $user)
        {
            $roles = $validated['roles'];

            $existingRoles = $user->roles()->get();

            foreach ($roles as $role)
            {
                if ($existingRoles->contains($role))
                {
                    return response()->json(['message' => 'The user already have that role.']);
                }

                $user->assignRole()->create([
                    'role_id' => $role,
                    'model_type' => $userClass,
                    'model_id' => $user->id,
                    'model_from' => $userClass
                ]);
            }

            return response()->json(new UserResource($user));
        }

        return response()->json(['message' => 'Unsuccessfully assign role or roles to the user.']);
    }
}
