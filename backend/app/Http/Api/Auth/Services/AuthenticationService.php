<?php

namespace App\Http\Api\Auth\Services;

use App\Http\Api\Role\Constants\Roles;
use App\Http\Api\Auth\Requests\LoginRequest;
use App\Http\Api\Auth\Requests\RegisterRequest;
use App\Http\Api\Auth\Requests\UpdateRequest;
use App\Http\Api\Auth\Resources\AuthResource;
use App\Http\Api\Auth\Models\Auth;
use App\Http\Api\Auth\Repositories\AuthenticationRepository;
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
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        if (!auth()->attempt($validated))
        {
            return response()->json(['message' => 'Email address or and password are incorrect.'], 401);
        }

        $user = Auth::findOrFail(auth()->user()->id);

        return response()->json(new AuthResource($user));
    }

    /**
     * Register the user with his credentials.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = Auth::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'avatar' => $validated['avatar'] ?? Auth::DEFAULT_AVATAR,
            'token' => Str::random(255),
        ]);

        $this->checkForAvatar($request, $user);

        $user->assignRole(Roles::EMPLOYEE_SELF_SERVICE_ROLE);

        return response()->json(new AuthResource($user));
    }

    /**
     * Update the user with new credentials.
     *
     * @param AuthenticationRepository $authenticationRepository
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(AuthenticationRepository $authenticationRepository, UpdateRequest $request): JsonResponse
    {
        $user = $authenticationRepository->getUserByToken($request);

        $user->update($request->validated());

        $this->checkForAvatar($request, $user);

        return response()->json(new AuthResource($user));
    }

    /**
     * Check if in the request is set avatar.
     *
     * @param RegisterRequest|UpdateRequest $request
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
