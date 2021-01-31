<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Verify Api Token
|--------------------------------------------------------------------------
|
| This class is a type of middleware, which prevents from
| access to different urls or different data for certain user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Authorization'))
        {
            return $next($request);
        }

        return response()->json(['message' => 'Not a valid API request.']);
    }
}
