<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $arr = ['email'=>$request->email, 'password'=>$request->password];
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        }
        if (Auth::attempt($arr, $remember)) {
            return redirect()->intended('admin/home');
        }else{
            return back()->withInput()->with('error','Tài khoản và mật khẩu không đúng!');
        }
    }
}
