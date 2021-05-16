<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
|--------------------------------------------------------------------------
| Authenticate With Token
|--------------------------------------------------------------------------
|
| This class is a type of middleware, which prevents from
| access to different urls or different data for certain user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthenticateWithToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->header('Authorization'))
        {
            return response()->json(['message' => 'Not a valid API request.'],RESPONSE::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
