<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        // validate data, create user, redirect to login form
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect()->route('login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        /*attempted authorization*/
        if(Auth::attempt([
           'email' => $request->get('email'),
           'password' => $request->get('password'),
        ])) {
            //ban check
            if(Auth::user()->ban == 1) {
                Auth::logout();
                return redirect()->back()->with('status', 'You are banned');
            } else {
                return redirect('/');
            }
        }
        else {
            return redirect()->back()->with('status', '
            Incorrect email or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        /*$request->session()->invalidate();
        $request->session()->regenerateToken();*/

        return redirect('/')->with('status', 'You are logged out of your account');
    }
}
