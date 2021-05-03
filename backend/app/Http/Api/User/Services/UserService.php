<?php

namespace App\Http\Api\User\Services;

use App\Http\Traits\UserManagement;
use App\Http\Api\User\Requests\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use Exception;

/**
|--------------------------------------------------------------------------
| User Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about user stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserService
{
    use UserManagement;

    /**
     * Update the user with new credentials.
     *
     * @param $user
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update($user, UpdateUserRequest $request): JsonResponse
    {
        return $this->changeUser($user, $request);
    }

    /**
     * Delete the user with his credentials.
     *
     * @param $user
     * @return JsonResponse
     * @throws Exception
     */
    public function delete($user): JsonResponse
    {
        return $this->removeUser($user);
    }
}
