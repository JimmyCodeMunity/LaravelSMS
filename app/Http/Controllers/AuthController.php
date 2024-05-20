<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{


    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        }

        // dd(Hash::make('password'));
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }


    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {


            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function forgotpassword(){
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request){
        // dd($request->all());
        
        $user = User::getEmailSingle($request->email);
        // dd($getEmailSingle);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success','Please check you email and reset your password');
        }else{
            return redirect()->back()->with('error',"Email not found");
        }

    }


    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        // dd($remember_token);

        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset',$data);

        }else{
            abort(404);
        }
    }


    public function PostReset($remember_token, Request $request){
        if($request->password == $request->cpassword){
            $user = User::getTokenSingle($remember_token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect('')->with('success','passwordreset successfully');


        }else{
            return redirect()->back()->with('error','Password not match');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
