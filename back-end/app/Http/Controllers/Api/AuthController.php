<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // will be hashed by the cast
        ]);

        $user->api_token = Str::random(60);
        $user->save();

        return response()->json(['user' => $user, 'token' => $user->api_token], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas.'],
            ]);
        }

        $user->api_token = Str::random(60);
        $user->save();

        return response()->json(['user' => $user, 'token' => $user->api_token]);
    }

    public function me(Request $request)
    {
        $token = $request->bearerToken() ?: $request->query('api_token');

        if (! $token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $user = User::where('api_token', $token)->first();

        if (! $user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // eager load purchased plans and completed courses
        $user->load(['plans' => function ($q) { $q->select('plans.id','name','description','price'); }, 'courses' => function ($q) { $q->select('courses.id','title','description','duration_minutes'); }]);

        return response()->json(['user' => $user]);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken() ?: $request->query('api_token');

        if ($token) {
            $user = User::where('api_token', $token)->first();
            if ($user) {
                $user->api_token = null;
                $user->save();
            }
        }

        return response()->json(['message' => 'Logged out']);
    }
}
