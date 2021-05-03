<?php

namespace App\Http\Api\User\Controllers;

use Exception;
use App\Http\Api\User\Requests\UpdateUserRequest;
use App\Http\Api\User\Resources\UserResource;
use App\Http\Api\User\Services\UserService;
use App\Http\Api\User\Resources\Collections\UserCollection;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic user data from the User Service class.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserController extends Controller
{
    /**
     * Initializing the instance of User Repository Interface.
     *
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * Initializing the instance of User Service class.
     *
     * @var UserService
     */
    private UserService $userService;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param UserService $userService
     */
    public function __construct(UserRepositoryInterface $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * Call the method for get all users from the user repository class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->userRepository->all();

        return response()->json(new UserCollection($users));
    }

    /**
     * Call the method for desired user from the user repository class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->userRepository->findById($id);

        return response()->json(new UserResource($user));
    }

    /**
     * Call the method for update from the service class.
     *
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);

        return $this->userService->update($user, $request);
    }

    /**
     * Call the method for delete from the service class.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);

        return $this->userService->delete($user);
    }
}
