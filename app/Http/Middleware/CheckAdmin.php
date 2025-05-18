<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->toUser();
        } catch (TokenExpiredException $e) {
            // Token has expired
            return response()->json(['error' => 'Token has expired'], 401);
        } catch (TokenInvalidException $e) {
            // Token is invalid
            return response()->json(['error' => 'Token is invalid'], 401);
        } catch (JWTException $e) {
            // Token is missing or not provided
            return response()->json(['error' => 'Token not provided'], 401);
        }

        if(!$user->is_admin) {
            return response()->json(['error' => 'You are not authorized for this page'], 403);
        }

        return $next($request);
    }
}
