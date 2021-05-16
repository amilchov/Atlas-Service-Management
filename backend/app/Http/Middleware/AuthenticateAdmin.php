<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Api\User\Models\User;
use App\Http\Api\Role\Constants\Roles;
use Symfony\Component\HttpFoundation\Response;

/**
|--------------------------------------------------------------------------
| Authenticate Admin
|--------------------------------------------------------------------------
|
| This class is a type of middleware, with which only admin
| can have access to different urls or different data for certain user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::role(Roles::ADMIN_ROLE)->firstOrFail();

        if ($request->header('Authorization') !== $user->token)
        {
            return response()->json(['message' => 'Not a valid API request.'], RESPONSE::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
