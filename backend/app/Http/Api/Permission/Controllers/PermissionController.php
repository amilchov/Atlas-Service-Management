<?php

namespace App\Http\Api\Permission\Controllers;

use App\Http\Api\Role\Repositories\RoleRepository;
use App\Http\Api\User\Repositories\UserRepository;
use App\Http\Api\Permission\Requests\AssignPermissionRequest;
use App\Http\Controllers\Controller;
use App\Http\Api\Permission\Services\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Permission Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic permission data from the Permission Service class.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class PermissionController extends Controller
{
    /**
     * Initializing the instance of Permission Service class.
     *
     * @var PermissionService
     */
    private PermissionService $permissionService;

    /**
     * PermissionController constructor.
     *
     * @param PermissionService $permissionService
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Call the method for permissions from the service class.
     *
     * @param UserRepository $userRepository
     * @param Request $request
     * @return JsonResponse
     */
    public function index(UserRepository $userRepository, Request $request): JsonResponse
    {
        return $this->permissionService->permissions($userRepository, $request);
    }

    /**
     * Call the method for assign permission to user from the service class.
     *
     * @param AssignPermissionRequest $request
     * @param RoleRepository $roleRepository
     * @return JsonResponse
     */
    public function assign(AssignPermissionRequest $request, RoleRepository $roleRepository): JsonResponse
    {
        return $this->permissionService->assignPermissionToUser($request, $roleRepository);
    }
}
