<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getAdminLogin()
    {
        return view('admin.auth.login');
    }

    public function postAdminLogin(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            if(auth()->user()->usertype){
                return redirect()->route('admin.dashboard');
            }
            Auth::logout();
        }
        return back()->withErrors(['email'=>'wrong credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
