<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|string|email|max:100|unique:users',
            'password'   => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'user',
            'status'     => 1,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully.',
            'user'   => $user,
            'token'  => $token,
        ], 201);
    }

    /**
     * Login user and return token
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => auth()->user(),
        ]);
    }
    /**
     * Logout user (invalidate the token)
     */
public function logout(Request $request)
{
    try {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'User successfully logged out']);
    } catch (JWTException $e) {
        return response()->json(['error' => 'Failed to logout, please try again'], 500);
    }
}


    /**
     * Get the authenticated user
     */
    public function me()
    {
        return response()->json(auth()->user());
    }    
}
