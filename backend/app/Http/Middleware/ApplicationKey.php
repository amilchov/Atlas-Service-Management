<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
|--------------------------------------------------------------------------
| Application Key
|--------------------------------------------------------------------------
|
| This class is a type of middleware, which prevents from
| access to different urls or different data.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ApplicationKey
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
        $token = $request->header('Application');

        if ($token !== config('app.api_key'))
        {
            return response()->json(['message' => 'Application key not found.'], RESPONSE::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
