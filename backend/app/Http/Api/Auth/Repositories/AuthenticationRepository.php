<?php

namespace App\Http\Api\Auth\Repositories;

use App\Http\Api\Auth\Models\Auth;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Authentication Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in whose we are getting
| logic connected with the user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthenticationRepository
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

        return Auth::where('token', $token)->firstOrFail();
    }
}
