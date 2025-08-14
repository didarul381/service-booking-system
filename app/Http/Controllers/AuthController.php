<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'customer'
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json(['user'=>$user,'token'=>$token]);
    }

    public function login(LoginRequest $request) {
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)) {
            return response()->json(['message'=>'Invalid credentials'],401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['user'=>$user,'token'=>$token]);
    }
}
