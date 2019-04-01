<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
class AdminController extends Controller
{
    function index(){
        return view('admin/loginScreen');
    }
    function checkLogin(Request $request){
        $this->validate($request,[
            'username'  => 'required',
            'password' => 'required'
        ]);

        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
            return redirect('admin/tenant');
        
        else
            return back()->with('error', 'Login failed. Please enter the correct login details.');
    }

    function successLogin(){
        return redirect('admin/tenant');
    }

    function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
