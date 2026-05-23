<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ValidarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol = null): Response
    {
        try {
            if (! $usuario = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'Usuario no existente'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Token expirado'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Token invalido'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token no brindado'], 401);
        }

        $usuario = auth('api')->user();
        if(!$rol){
            return $next($request);
        }
        else if ($usuario->rol->nombre != $rol) {
            return response()->json(['error' => 'Permisos denegados'], 403);
        }

        return $next($request);
    }
}
