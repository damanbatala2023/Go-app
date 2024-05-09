<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use  App\Models\PasswordReset;
use Mail;
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
        try{
            $user = User::where('email',$request->email)->get();
            if(count($user)>0){
                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset?token='.$token;

                $data ['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on below link to reseet your password.';

                $dataTime = Mail::send('forgetPasswordMail',['data=>$data'],function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                $dateTime = carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::updateOrCreate(
                    ['email'=>$request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dataTime
                    ]
                    );
                    return back()->with('success','Please check your Mail to reset your password.');

            }
            else{
                return back()->with('error','Email does not exists!');
            }
           

            } catch(\Exception $e){
                return back()->with('error',$e->getmessage());
            }

        }

    //     public function showForgetPasswordMailForm()
    // {
    //     return view('auth.forgetPasswordMail');
    // }
}
