<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(User $user)
    {
        //validate
        $validated = request()->validate([
            'name' => 'required|max:15',
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|confirmed',
        ]);
        //create user
        $user = User::create($validated);

        //send email
        Mail::to($user->email)
        ->send(new WelcomeEmail($user));

        //redirect with success
        return redirect(route('login'))->with('success','Account created!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function auth()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->route('index')->with('success','Welcome back, '.Auth::user()->name);
        }
        else {
            return redirect()->back()->withErrors('error','Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('index')->with('success','You\'re logged out');
    }
}