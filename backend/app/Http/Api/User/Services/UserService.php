<?php

namespace App\Http\Api\User\Services;

use App\Http\Api\User\Models\User;
use App\Http\Api\User\Requests\UpdateRequest;
use App\Http\Api\User\Resources\UserResource;
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
    /**
     * Update the user with new credentials.
     *
     * @param $user
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update($user, UpdateRequest $request): JsonResponse
    {
        $user->deletePicture(User::class, $user, 'avatar');

        $user->update($request->validated());

        $user->checkForPicture($request, 'avatar', 'avatars', $user);

        return response()->json(new UserResource($user));
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
        $user->deletePicture(User::class, $user, 'avatar');

        $user->delete();

        return response()->json(['message' => 'The user was successfully deleted.']);
    }
}
