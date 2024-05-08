<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgetForm()
    {
        return view('auth.forget');
    }
    
    public function postForgetForm(Request $request)
    {
        // dd($request->all());
        $getEmailSingle = User::getEmailSingle($request->email);
        dd($getEmailSingle);
    }
}
