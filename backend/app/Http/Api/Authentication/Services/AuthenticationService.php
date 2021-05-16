<?php

namespace App\Http\Api\Authentication\Services;

use App\Http\Api\Authentication\Requests\LoginUserRequest;
use App\Http\Api\Authentication\Requests\RegisterUserRequest;
use App\Http\Api\Role\Constants\Roles;
use App\Http\Api\User\Resources\UserResource;
use App\Http\Api\User\Models\User;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
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
     * Initializing the instance of User Repository interface.
     *
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * AuthenticationService constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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
            return response()->json(['message' => 'Email address or/and password are incorrect.'], 401);
        }

        $user = $this->userRepository->findById(auth()->user()->id);

        $user->update([
            'last_login_ip' => $request->getClientIp(),
            'last_login_at' => Carbon::now()->toDateTimeString()
        ]);

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

        $userClass = User::class;

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'avatar' => $validated['avatar'] ?? User::DEFAULT_PICTURE,
            'token' => Str::random(255)
        ]);

        $user->checkForPicture($request, 'avatar', 'avatars', $user);

        $user->assignRole()->create([
            'role_id' => Roles::EMPLOYEE_SELF_SERVICE_ROLE,
            'model_type' => $userClass,
            'model_id' => $user->id,
            'model_from' => $userClass
        ]);

        return response()->json(new UserResource($user));
    }
}
