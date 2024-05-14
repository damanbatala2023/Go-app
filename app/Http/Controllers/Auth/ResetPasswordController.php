<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
   

    public function showResetPasswordForm(Request $request)
    {
        $resetData = PasswordReset::where('token',$request->token)->get();

        if(isset($request->token) && count($resetData)>0){
            $user = User::where('email',$resetData[0]['email'])->get();
            // dd($user);
            return view('auth.resetpassword',compact('user'));
        }
        else{
            return view('auth.404');
        }
    }

    public function postResetForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email','$user->email')->delete();
        return redirect('/login');

    }

}
