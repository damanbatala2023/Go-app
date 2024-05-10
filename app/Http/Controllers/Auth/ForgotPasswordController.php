<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForgetForm()
    {
        return view('auth.forget');
    }
    
    public function postForgetForm(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
             // Use 'first()' instead of 'get()' to retrieve a single user

            if ($user) {
                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/reset?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on the link below to reset your password.';

                $dateTime = Carbon::now()->format('Y-m-d H:i:s');

                Mail::send('auth.forgetPasswordMail', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                );

                return back()->with('success', 'Please check your email to reset your password.');
            } else {
                return back()->with('error', 'Email does not exist!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
