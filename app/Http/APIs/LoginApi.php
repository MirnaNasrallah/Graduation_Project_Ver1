<?php

namespace App\Http\APIs;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginApi extends Controller
{

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if (
            Hash::check($request->input('password'), $user->password) &&
            $user->level_id == 1 &&
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
        ) {
            return response()->json([
                'Success' => '200',
            ]);
        } elseif (
            Hash::check($request->input('password'), $user->password) &&
            $user->level_id == 2 &&
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
        ) {
            return response()->json([
                'Success' => '200',
                'Premium' => true
            ]);
        } else {
            return response()->json([
                'Failed To Join' => '401'
            ]);
        }
    }
}
