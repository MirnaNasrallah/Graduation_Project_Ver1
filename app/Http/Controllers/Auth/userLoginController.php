<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class userLoginController extends Controller
{
    public function loginOpen()
    {
       return view('auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if(Hash::check($request->input('password'), $user->password) &&
        $user->level_id == 1 &&
         Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('userProfileNew');
        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }
}
