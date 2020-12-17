<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\Auth\AuthenticationService;
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
     * @param LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest  $request): JsonResponse
    {
        return $this->authenticationService->login($request);
    }

    /**
     * Call the method for register from the service class.
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        return $this->authenticationService->register($request);
    }
}
