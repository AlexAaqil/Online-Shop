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

    public function get_add_admin() {
        return view("admin/add_admin");
    }

    public function post_add_admin(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

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

    public function post_update_admin($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $admin = User::find($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->status = $request->status;
        if(!empty($request->password)){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect("admin/list")->with('success', "Admin details updated successfully!");
    }

    public function delete_admin($id) {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('list_admins')->with('success', "Admin deleted successfully!");
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
