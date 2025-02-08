<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        return view('backend.auth.login');
    }

    public function login(AuthPostRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
             return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công.');
        }
        return back()->with('error','Thông tin email hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('auth.admin');
    }
}
