<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>["required","max:255"],
            'email'=>["required","email","unique:users","max:255"],
            'password'=>['required','min:4','confirmed']
        ]);
        
        $user= User::create($fields);
        Auth::login($user);

        return redirect()->intended('post');
    } 

    public function Login(Request $request){
        $fields=$request->validate([
            'email'=>["required"],
            'password'=>['required']
        ]);
        
        if(Auth::attempt($fields,$request->remember)){
            return redirect()->intended('post');
        }else{
            return back()->withErrors([
                'failed'=>"The provided credentials do not match our records"
            ]);
        };
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route("login");

    }
  
}
