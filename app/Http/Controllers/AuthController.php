<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller
{
    public function get_signup() {
        return view("/signup");
    }

    public function post_signup(Request $request) {
        request()->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->profile_picture = '';
        $user->save();

        return redirect("/login")->with('success', "Your account was created. You can now login.");
    }

    public function get_login() {
        if(!empty(Auth::check())) {
            if(Auth::user()->is_admin ==1) {
                return redirect("admin/dashboard");
            }
            return redirect("/shop");
        }
        return view("/login");
    }

    public function post_login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->is_admin==1 && Auth::user()->status==1) {
                return redirect('admin/dashboard');
            }
            return redirect('/shop');
        }
        else {
            return redirect()->back()->with('error', "OOPS!!! Something went wrong");
        }
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
