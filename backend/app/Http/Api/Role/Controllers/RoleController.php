<?php

namespace App\Http\Api\Role\Controllers;

use App\Http\Api\Role\Requests\AssignRoleRequest;
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
     * RoleController constructor.
     *
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Call the method for roles from the service class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->roleService->all();
    }

    /**
     * Call the method for show a role from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->roleService->show($id);
    }

    /**
     * Call the method for assign role to user from the service class.
     *
     * @param AssignRoleRequest $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function assign(AssignRoleRequest $request, UserRepository $userRepository): JsonResponse
    {
        return $this->roleService->assignRoleToUser($request, $userRepository);
    }
}
