<?php

namespace App\Http\Api\Authentication\Services;

use App\Http\Api\Authentication\Requests\LoginRequest;
use App\Http\Api\Authentication\Requests\RegisterRequest;
use App\Http\Api\User\Resources\UserResource;
use App\Http\Api\User\Models\User;
use App\Http\Api\User\Repositories\UserRepository;
use App\Http\Api\Role\Constants\Roles;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

/**
|--------------------------------------------------------------------------
| Authentication Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are doing
| the whole logic about authentication stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthenticationService
{
    /**
     * Initializing the instance of User Repository class.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * AuthenticationService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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

        $user = $this->userRepository->findById(auth()->user()->id);

        return response()->json(new UserResource($user));
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

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'avatar' => $validated['avatar'] ?? User::DEFAULT_PICTURE,
            'token' => Str::random(255),
        ]);

        $user->checkForPicture($request, 'avatar', 'avatars', $user);

        $user->assignRole(Roles::EMPLOYEE_SELF_SERVICE_ROLE);

        return response()->json(new UserResource($user));
    }
}
