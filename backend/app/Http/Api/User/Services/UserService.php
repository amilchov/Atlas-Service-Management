<?php

namespace App\Http\Api\User\Services;

use App\Http\Api\User\Resources\Collections\UserCollection;
use App\Http\Api\Auth\Models\Auth;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Auth Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in whose we are doing
| the whole logic about users stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserService
{
    /**
     * Get all users with their roles.
     *
     * @return JsonResponse
     */
    public function all() : JsonResponse
    {
        $users = Auth::with('roles')->get();

        return response()->json(new UserCollection($users));
    }
}
