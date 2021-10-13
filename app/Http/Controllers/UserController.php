<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        //dd($request);
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'this email is not exists on users table'
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::attempt($creds)){
            //dd('home');
            return redirect()->route('admins.utilisateurs.consulter');
        }else{
            //dd('error');
            return back()->with('error', 'incorrect credentials');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/admin');
    }
}
