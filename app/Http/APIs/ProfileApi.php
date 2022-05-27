<?php

namespace App\Http\APIs;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfileApi
{
    public function ProfileApi( Request $request)
    {

       $user= User::find($request->user_id);

        $token = $user->createToken($user->name)->plainTextToken;
        return response()->json([
            "token" => $token,
            "type" => "Bearer",
            "message" => __("User login successful"),
            "user" => $user,
        ]);
        return response()->json([
            "user" => $user,
            "message"=> 'profile accessed'
        ]);

    }
}
