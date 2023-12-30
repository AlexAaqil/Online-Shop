<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list_admins() {
        $list_admins = User::getAdmins();
        $list_users = User::getUsers();

        return view("admin/admins_list", compact('list_admins', 'list_users'));
    }

    public function list_users() {
        $list_users = User::getUsers();
        return view("admin/list_users", compact('list_users'));
    }
}
