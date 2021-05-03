<?php

namespace App\Http\Traits;

use App\Http\Api\User\Models\User;
use App\Http\Api\User\Requests\UpdateUserRequest;
use App\Http\Api\User\Resources\UserResource;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| User Management
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
     * Initializing the instance of User class.
     *
     * @var string
     */
    private string $userClass = User::class;

    /**
     * Set the default picture.
     *
     * @var string
     */
    private string $defaultPicture = 'avatar';

    /**
     * Update the user with new credentials.
     *
     * @param $user
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function changeUser($user, UpdateUserRequest $request): JsonResponse
    {
        $user->deletePicture($this->userClass, $user, $this->defaultPicture);

        $user->update($request->validated());

        $user->checkForPicture($request, $this->defaultPicture, 'avatars', $user);

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
        $user->deletePicture($this->userClass, $user, $this->defaultPicture);

        $user->callers()->delete();
        $user->executors()->delete();
        $user->delete();

        return response()->json(['message' => 'The user was successfully deleted.']);
    }
}
