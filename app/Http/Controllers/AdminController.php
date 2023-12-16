<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    public function index() {
        return view("admin/login");
    }

    public function dashboard() {
        $count_admins = User::getAdmins()->count();

        return view("admin/dashboard", compact('count_admins'));
    }

    public function add_admin_form() {
        return view("admin/add_admin");
    }

    public function add_admin(Request $request) {
        $admin = new User;
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->password = Hash::make($request->password);
        $admin->is_admin = 1;
        $admin->profile_picture = '';
        $admin->save();

        return redirect("admin/list")->with('success', "The new admin was successfully added!");
    }

    public function get_update_admin($id) {
        $admin = User::find($id);
        return view("admin.update_admin", compact('admin'));
    }

    public function list_admins() {
        $list_admins = User::getAdmins();

        return view("admin/admins_list", compact('list_admins'));
    }

    public function categories() {
        return view("admin/categories");
    }

    public function products() {
        return view("admin/products");
    }
}
