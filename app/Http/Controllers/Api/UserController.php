<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (JWTAuth::attempt($credentials)) {
            $user = JWTAuth::user();
            $token = $user->createToken('UserToken')->accessToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
