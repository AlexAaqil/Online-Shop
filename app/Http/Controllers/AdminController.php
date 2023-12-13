<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index() {
        return view("admin.dashboard");
    }

    public function login(Request $request) {
        if($request->isMethod('post')){
            $data = $request->only('email','password');

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                return redirect("admin/dashboard");
            }
            else {
                return redirect()->back()->with("error_message", "Invalid Email or Password");
            }
        }
        return view("admin.login");
    }
}
