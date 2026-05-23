<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Hash;
use Override;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login()
    {
        //  return Hash::make('123456');
        $credentials = request(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function registro(UsuarioRequest $request)
    {
        $usuario = $request->validated();
        $usuario['rol_id'] = $request->input('rol_id');
        User::create($usuario);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();   

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        try {
            $nuevoToken = JWTAuth::parseToken()->refresh();

            return $this->respondWithToken($nuevoToken);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No autorizado'
            ], 401);
        }
    }
}
