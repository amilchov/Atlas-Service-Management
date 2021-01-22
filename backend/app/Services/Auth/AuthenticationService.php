<?php

namespace App\Services\Auth;

use App\Constants\Roles;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\Auth\User;
use App\Repositories\Auth\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

/**
|--------------------------------------------------------------------------
| Authentication Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in whose we are doing
| the whole logic about authentication stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthenticationService
{
    /**
     * Login the user with his credentials.
     *
     * @param LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        if (!auth()->attempt($validated))
        {
            return response()->json(['message' => 'Email address or and password are incorrect.'], 401);
        }

        $user = User::findOrFail(auth()->user()->id);

        return response()->json(new UserResource($user));
    }

    /**
     * Register the user with his credentials.
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'avatar' => $validated['avatar'] ?? User::DEFAULT_AVATAR,
            'token' => Str::random(255),
        ]);

        $this->checkForAvatar($request, $user);

        $user->assignRole(Roles::EMPLOYEE_SELF_SERVICE_ROLE);

        return response()->json(new UserResource($user));
    }

    /**
     * Update the user with new credentials.
     *
     * @param UserRepository $userRepository
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(UserRepository $userRepository, UpdateUserRequest $request): JsonResponse
    {
        $user = $userRepository->getUserByToken($request);

        $user->update($request->validated());

        $this->checkForAvatar($request, $user);

        return response()->json(new UserResource($user));
    }

    /**
     * Check if in the request is set avatar.
     *
     * @param RegisterUserRequest|UpdateUserRequest $request
     * @param $user
     */
    private function checkForAvatar($request, $user): void
    {
        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

            $filename = $user->id . '.' . time() . $avatar->getClientOriginalName();

            $user->avatar = $avatar->storeAs('avatars', $filename, 'public');

            $user->save();
        }
    }
}
