<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function admin_login() {
        if(!empty(Auth::check()) && Auth::user()->is_admin ==1) {
            return redirect("admin/dashboard");
        }

        return view("admin.login");
    }

    public function admin_auth_login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 1])) {
            return redirect('admin/dashboard');
        }
        else {
            return redirect()->back()->with('error', "OOPS!!! Something went wrong");
        }
    }

    public function admin_logout(Request $request): RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/');
    }
}
