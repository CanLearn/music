<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (! Hash::check($request->password , optional($user)->password))
        {
            throw ValidationException::withMessages([
               'email' => 'اطلاعات ایمیل شما تایید نشده هنوز !! ممنون میشیم دوباره امتخان کنید ' ,

            ]);
        }
    }
}
