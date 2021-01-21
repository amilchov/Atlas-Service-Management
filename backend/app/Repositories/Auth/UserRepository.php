<?php

namespace App\Repositories\Auth;

use App\Models\Auth\User;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| User Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in whose we are doing
| the whole logic about update user stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserRepository
{
    /**
     * Get user by the specific token.
     *
     * @param Request $request
     * @return mixed
     */
    public function getUserByToken(Request $request)
    {
        $token = $request->header('Authorization');

        return User::where('token', $token)->firstOrFail();
    }
}
