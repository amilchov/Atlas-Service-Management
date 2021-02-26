<?php

namespace App\Http\Api\Role\Controllers;

use App\Http\Api\Role\Repositories\RoleRepository;
use App\Http\Api\Role\Requests\AssignRequest;
use App\Http\Api\Role\Resources\Collections\RoleCollection;
use App\Http\Api\User\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Api\Role\Services\RoleService;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Role Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic role data from the Role Service class.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleController extends Controller
{
    /**
     * Initializing the instance of Role Service class.
     *
     * @var RoleService
     */
    private RoleService $roleService;

    /**
     * Initializing the instance of Role Repository class.
     *
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * RoleController constructor.
     *
     * @param RoleRepository $roleRepository
     * @param RoleService $roleService
     */
    public function __construct(RoleRepository $roleRepository, RoleService $roleService)
    {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
    }

    /**
     * Call the method for roles from the service class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $roles = $this->roleRepository->all();

        return response()->json(new RoleCollection($roles));
    }

    /**
     * Call the method for assign role to user from the service class.
     *
     * @param AssignRequest $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function assign(AssignRequest $request, UserRepository $userRepository): JsonResponse
    {
        return $this->roleService->assignRoleToUser($request, $userRepository);
    }
}
