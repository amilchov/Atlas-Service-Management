<?php

namespace App\Http\Api\User\Repositories;

use App\Http\Api\User\Models\User;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| User Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in which we are
| getting database data connected with the user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserRepository
{
    /**
     * Get all users with their roles.
     *
     * @return mixed
     */
    public function all()
    {
        return User::with('roles')->get();
    }

    /**
     * Find user by the specific token.
     *
     * @param Request $request
     * @return mixed
     */
    public function findByToken(Request $request)
    {
        $token = $request->header('Authorization');

        return User::where('token', $token)->firstOrFail();
    }

    /**
     * Get user by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return User::findOrFail($id);
    }
}
