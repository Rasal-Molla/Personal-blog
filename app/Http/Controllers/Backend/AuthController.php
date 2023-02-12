<?php

namespace App\Http\Controllers\Backend;

use notify;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginForm(){
        return view('Backend.Pages.login');
    }

    public function loginProcess(Request $request){

        $credientials = $request->except('_token');
        //dd($credientials);
        if(Auth::attempt($credientials))
        {
            if(auth()->user()->role == 'admin')
            {
                return redirect()->route('dashboard')->with('message','Login successfully!');
            }else{
                Auth::logout();
                return redirect()->back()->with('role','Your role not match');
            }
        }
        return redirect()->back()->with('error','Invalid Credientials');
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('admin.login')->with('message', 'Your are login out!');
    }

    public function registrationForm(){
        return view('Backend.Pages.registration');
    }

    public function store(Request $request){

        //dd($request->all());
        $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric|regex:/(01)[0-9]{9}/',
            'password'=>'required'
        ]);

        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password)

        ]);

        //return redirect()->route('admin.login');
        return redirect()->back()->with('message', 'Registration Completed');
    }

    public function forgetPassword(){
        return view('Backend.Pages.forgetPassword');
    }

    public function resetPasswordLink(Request $request){

        $request->validate([
            'email'=>'required|email|exists:users'
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('Backend/Pages/forgetPasswordUpdate', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->back()->with('success', 'We have e-mailed your password reset link!');
    }


    public function forgetPasswordUpdate(){

        return view('Backend.Pages.forgetPasswordUpdate');

    }


}
