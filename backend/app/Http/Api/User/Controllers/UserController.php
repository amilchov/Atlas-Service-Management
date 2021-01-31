<?php

namespace App\Http\Api\User\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Api\User\Services\UserService;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Chart Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in whose we have
| the basic user data from the Auth Service.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserController extends Controller
{
    /**
     * Call the method for users from the service class.
     *
     * @param UserService $userService
     * @return JsonResponse
     */
    public function users(UserService $userService): JsonResponse
    {
        return $userService->all();
    }
}
