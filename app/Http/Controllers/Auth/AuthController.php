<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, true)) {
            // User is authenticated
            $user = Auth::user();

            // Check if the user's usertype is falsy
            if (auth()->user()->usertype) {
                // User's usertype is falsy, allow login
                return redirect()->route('home.dashboard');
            } else {
                // User's usertype is truthy, deny access
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'You do not have permission to access this page.']);
            }
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/login');
    }
}
