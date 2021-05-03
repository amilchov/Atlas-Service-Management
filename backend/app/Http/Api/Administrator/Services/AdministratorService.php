<?php

namespace App\Http\Api\Administrator\Services;

use App\Http\Traits\UserManagement;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use App\Http\Api\User\Requests\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Administrator Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about administrator stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AdministratorService
{
    use UserManagement;

    /**
     * Initializing the instance of User Repository interface.
     *
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * AdministratorService constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Update the user with his credentials.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function updateUser(int $id, UpdateUserRequest $request): JsonResponse
    {
        $this->userRepository->findByToken($request);

        $user = $this->userRepository->findById($id);

        return $this->changeUser($user, $request);
    }

    /**
     * Delete the user with his credentials.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteUser(int $id, Request $request): JsonResponse
    {
        $this->userRepository->findByToken($request);

        $user = $this->userRepository->findById($id);

        return $this->removeUser($user);
    }
}
