<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function forgot_password()
    {
        return view('auth.forgot_password');
    }

    public function create_user(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect()->route('auth.login')->with('success', 'Account registered successfully! Please verify your email address.');
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect()->route('auth.login')->with('success', 'Your account successfully verified!');
        } else {
            abort(404);
        }
    }

    public function auth_login(Request $request)
    {
        // dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (!empty(Auth::user()->email_verified_at)) {
                echo "successfully!";
                die;
            } else {
                $user_id=Auth::user()->id;
                Auth::logout();

                $save = User::getSingle($user_id);
                $save->remember_token = Str::random(40);
                $save->save();

                Mail::to($save->email)->send(new RegisterMail($save));
                return redirect()->back()->with('warning', 'Please verify your email address first !');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password !');
        }
    }
}
