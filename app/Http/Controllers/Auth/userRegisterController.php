<?php


namespace App\Http\Controllers\Auth;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userRegisterController extends Controller
{

    public function registerOpen()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        
        // $user->role_id = 2;
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
        // $data = $request->all();
        // $check = $this->create($data);
        $user->save();

        return redirect()->route('user.login');
    }

}
