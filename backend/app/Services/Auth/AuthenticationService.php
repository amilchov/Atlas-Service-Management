<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
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

        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

            $filename = $user->id . '.' . time() . $avatar->getClientOriginalName();

            $user->avatar = $avatar->storeAs('avatars', $filename, 'public');

            $user->save();
        }

        $user->assignRole(User::EMPLOYEE_SELF_SERVICE_ROLE);

        return response()->json(new UserResource($user));
    }
}
