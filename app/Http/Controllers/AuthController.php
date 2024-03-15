<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    // metodo de autenticación
    public function login (Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()){
            return response()->json(['error' => 'Complete the fields correctly'], 422);
        } else {
            $user = User::where('email', $request->email)->first();

            if (Hash::check($request['password'], $user->password)){
                $token = PersonalAccessToken::where('tokenable_id', $user->id);
                $token->delete();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['error' => 'Incorrect credentials'], 401);
            }
        }
    }

    public function logout (Request $request){
        $request->user()->currentAccessToken()->delete();

        return ['message' => 'Successful logout'];
    }
}
