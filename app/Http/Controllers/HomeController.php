<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
    public function index2()
    {
        return view('welcome');
    }


    public function info()
    {
        if (Auth::check()) {
            $users = User::find(Auth::user()->id);
        }

        return view('userProfileNew', ['users' => $users]);
    }
    public function edit()
    {
        if (Auth::check()) {
            $users = User::find(Auth::user()->id);


            return view('userProfileNew', ['users' => $users]);
        }
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $users = User::find(Auth::user()->id);
            $users->name = $request->input('name' , $users->name);
            $users->email = $request->input('email'  , $users->email);
            $users->phone = $request->input('phone' , $users->phone);
            $users->job = $request->input('job'  , $users->job);
            $users->address = $request->input('address' , $users->address);
            $users->interests = $request->input('interests'  , $users->interests);
            $users->save();
            return redirect("userProfileNew")->withSuccess('Great! You have Successfully update');
        }
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            Auth()->user()->update(['image' => $filename]);
        }
        return redirect()->back();
    }
}
