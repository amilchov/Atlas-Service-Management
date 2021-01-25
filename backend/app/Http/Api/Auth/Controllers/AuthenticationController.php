<?php

namespace App\Http\Api\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Api\Auth\Requests\LoginRequest;
use App\Http\Api\Auth\Requests\RegisterRequest;
use App\Http\Api\Auth\Requests\UpdateRequest;
use App\Http\Api\Auth\Repositories\AuthenticationRepository;
use App\Http\Api\Auth\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Authentication Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in whose we have
| the basic authentication stuff from the Authentication Service.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthenticationController extends Controller
{
    /**
     * Private variable for initialize the instance of Authentication Service class.
     *
     * @var AuthenticationService
     */
    private AuthenticationService $authenticationService;

    /**
     * AuthenticationController constructor.
     *
     * @param AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * Call the method for login from the service class.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest  $request): JsonResponse
    {
        return $this->authenticationService->login($request);
    }

    /**
     * Call the method for register from the service class.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->authenticationService->register($request);
    }

    /**
     * Call the method for update from the service class.
     *
     * @param AuthenticationRepository $authenticationRepository
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(AuthenticationRepository $authenticationRepository, UpdateRequest $request): JsonResponse
    {
        return $this->authenticationService->update($authenticationRepository, $request);
    }
}
