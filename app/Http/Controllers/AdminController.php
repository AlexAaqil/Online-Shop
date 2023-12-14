<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view("admin/login");
    }

    public function dashboard() {
        return view("admin/dashboard");
    }

    public function list_admins() {
        $data['list_admins'] = User::getAdmins();
        return view("admin/admins_list", $data);
    }

    public function categories() {
        return view("admin/categories");
    }

    public function products() {
        return view("admin/products");
    }
}
