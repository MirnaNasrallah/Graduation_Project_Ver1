<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PremiumUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function upgrade()
    {
        if (Auth::check()) {
            $users = User::find(Auth::user()->id);
            $users->level_id = 2;
            $users->save();
            return view('premium.profile', ['users' => $users]);
        }

    }
    public function downgrade()
    {
        if (Auth::check()) {
            $users = User::find(Auth::user()->id);
            $users->level_id = 1;
            $users->save();
            return view('premium.profile', ['users' => $users]);
        }

    }
    public function viewProfile()
    {
        $users =  User::find(Auth::user()->id);
        return view('premium.profile', ['users' => $users]);
    }

}
