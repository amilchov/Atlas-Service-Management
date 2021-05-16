<?php

namespace App\Http\Api\Administrator\Controllers;

use App\Http\Api\Administrator\Services\AdministratorService;
use App\Http\Api\User\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Administrator Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic administrator data from the Administrator Service class.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AdministratorController extends Controller
{
    /**
     * Initializing the instance of Administrator Service class.
     *
     * @var AdministratorService
     */
    private AdministratorService $administratorService;

    /**
     * AdministratorController constructor.
     *
     * @param AdministratorService $administratorService
     */
    public function __construct(AdministratorService $administratorService)
    {
        $this->administratorService = $administratorService;
    }

    /**
     * Update the user with the specific id.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function updateUser(int $id, UpdateUserRequest $request): JsonResponse
    {
        return $this->administratorService->updateUser($id, $request);
    }

    /**
     * Delete the user with the specific id.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function destroyUser(int $id, Request $request): JsonResponse
    {
        return $this->administratorService->deleteUser($id, $request);
    }
}
