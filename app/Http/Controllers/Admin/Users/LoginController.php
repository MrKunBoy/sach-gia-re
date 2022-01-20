<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',[
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password'=> $request->password])){
            return redirect()->route('admin');
        }else{
            Session::flash('error', 'Email hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
