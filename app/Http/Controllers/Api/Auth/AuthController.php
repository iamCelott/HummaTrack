<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($request->email)->plainTextToken;
                return response()->json([
                    'message' => 'Berhasil login',
                    'token' => $token,
                    'role' => $user->roles->pluck('name'),
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'foto' => $user->foto,
                    'password' => $user->password
                ]);
            } else {
                return response()->json(['message' => 'Password salah'], 401);
            }
        } else {
            return response()->json(['message' => 'Email dan password salah'], 401);
        }
    }
}
