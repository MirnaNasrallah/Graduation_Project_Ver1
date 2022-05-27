<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;


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

        $user = User::Where('email', $request->input('email'))->first();
      if($user === null)
        {
            Alert::error('Error', 'Incorrect Email or Password');
            return back()->with('error', 'your username and password are wrong.');
        }

        if (
            Hash::check($request->input('password'), $user->password) &&
            $user->level_id == 1 &&
            $user->email == $request->input('email') &&
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
        ) {
            return redirect()->route('userProfileNew');
        } elseif (
            Hash::check($request->input('password'), $user->password) &&
            $user->level_id == 2 &&
            $user->email == $request->input('email') &&
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
        ) {

            return redirect()->route('viewPremiumProfile');
        }

        else {
            Alert::error('Error', 'Incorrect Email or Password');
            return back()->with('error', 'your username and password are wrong.');
        }
    }
}
