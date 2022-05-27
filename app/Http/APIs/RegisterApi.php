<?php

namespace App\Http\APIs;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterApi extends Controller
{

    public function register(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken($user->name)->plainTextToken;
        return response()->json([
            "token" => $token,
            "type" => "Bearer",
            "message" => __("User registered & logged in successfully"),
            "user" => $user,
        ]);
    }
}
