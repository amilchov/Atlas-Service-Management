<?php

namespace App\Http\Traits;

use App\Http\Api\User\Models\User;
use App\Http\Api\User\Requests\UpdateRequest;
use App\Http\Api\User\Resources\UserResource;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Use rManagement
|--------------------------------------------------------------------------
|
| This class is a type of trait, in which we manage
| different things with users.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
trait UserManagement
{
    /**
     * Update the user with new credentials.
     *
     * @param $user
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function changeUser($user, UpdateRequest $request): JsonResponse
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
     */
    public function removeUser($user): JsonResponse
    {
        $user->deletePicture(User::class, $user, 'avatar');

        $user->delete();

        return response()->json(['message' => 'The user was successfully deleted.']);
    }
}
