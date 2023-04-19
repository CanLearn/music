<?php

namespace App\Http\Controllers\Sanctum;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class SanctumController extends Controller
{
    public function register(LoginRequest $request , User $user)
    {
        $data = $request->validated();

        $users =  new User();
        $users->name = $request->name ;
        $users->email = $request->email ;
        $users->password = Hash::make($request->password);
        $users->save();

        $token = $users->createToken($users->name)->plainTextToken;
        Auth::login($users);
        return response(['ok'] , 200);

    }

    public function login(LoginRequest $request )
    {
       $request->validated();
        $users = User::where('email' , '=' , $request->email)->first();

        $token = $users->createToken($users->password)->plainTextToken;

        return response(['ok'] , 200);
    }
    public function logout(Request $request ,User $user)
    {
        $user->tokens()->delete();

        return response(['ok'] , 200);
    }
}
