<?php

namespace App\Http\Api\User\Interfaces;

use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| User Repository Interface
|--------------------------------------------------------------------------
|
| This class is a type of interface, in which we are
| specify all methods for the repository.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * Get all users with their roles.
     *
     * @return mixed
     */
    public function all(): mixed;

    /**
     * Find user by the specific token.
     *
     * @param Request $request
     * @return mixed
     */
    public function findByToken(Request $request): mixed;

    /**
     * Get user by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed;
}
