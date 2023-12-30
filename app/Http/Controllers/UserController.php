<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function list_admins() {
        $list_admins = User::getAdmins();
        $list_users = User::getUsers();

        return view("admin/admins_list", compact('list_admins', 'list_users'));
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
        $admin->is_admin = $request->user_level;
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

    public function list_users() {
        $list_users = User::getUsers();
        return view("admin/list_users", compact('list_users'));
    }

    public function get_update_user($id) {
        $admin = User::find($id);
        return view("admin.update_user", compact('admin'));
    }

    public function post_update_user($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $admin = User::find($id);
        $admin->status = $request->status;
        $admin->is_admin = $request->user_level;
        $admin->save();

        return redirect("admin/users/list")->with('success', "User details updated successfully!");
    }
}
