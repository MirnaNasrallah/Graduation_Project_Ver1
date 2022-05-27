<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminLoginController extends Controller
{





    public function adminLogin()
    {
        return view('auth.adminLogin');
    }


    public function adminPostLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if($user === null)
        {
            Alert::error('Error', 'Incorrect Email or Password');
            return back()->with('error', 'your username and password are wrong.');
        }
        if(Hash::check($request->input('password'), $user->password) &&
        $user->level_id == 0 &&
         Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('AdminDashboard');
        } else {
            Alert::error('Error', 'Incorrect Email or Password');
            return back()->with('error','your username and password are wrong.');
        }




        //  $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // $admin = Admin::where('email', $request->input('email'))->first();
        // if(Hash::check($request->input('password'), $admin->password) &&
        //  Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        // {
        //     return redirect()->route('AdminDashboard');
        // } else {
        //     return back()->with('error','your username and password are wrong.');
        // }


        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('AdminDashboard')
        //         ->withSuccess('You have Successfully loggedin');
        // } else {
        //     return redirect("adminLogin")->withSuccess('Opps! You have entered invalid credentials');
        // }





    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success','You are logout successfully');
        return redirect(route('adminLogin'));
    }
    public function AdminDashboard()
    {
        return view('AdminDashboard');

    }

}
