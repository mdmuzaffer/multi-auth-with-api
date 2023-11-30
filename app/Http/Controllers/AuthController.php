<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loadRegister(){

        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }


    public function register(Request $request){

        $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "4";
        $user->save();
        return back()->with('success','Your register has been succesfully');

    }

    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }


    public function login(Request $request){

         $request->validate([
            'email' => 'string|required|email',
            'password' => 'required',
        ]);

         $userCadentials = $request->only('email','password');
         if(Auth::attempt($userCadentials)){
            $route = $this->redirectDash();
            return redirect($route);
         }else{
            return back()->with('error','Username & Password incorrect');
         }

    }


    public function loadDashboard(){
        return view('user.dashboard');
    }


    public function redirectDash(){

        $redirect = '';

        if(Auth::user() && Auth::user()->role =='1'){
            $redirect = '/admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role =='2'){
            $redirect = '/doctor/dashboard';
        }
        else if(Auth::user() && Auth::user()->role =='3'){
            $redirect = '/intern/dashboard';
        }
        else if(Auth::user() && Auth::user()->role =='4'){
            $redirect = '/dashboard';
        }

        return $redirect;

    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

}
