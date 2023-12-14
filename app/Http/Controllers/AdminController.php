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
        $count_admins = User::getAdmins()->count();

        return view("admin/dashboard", with([
            'count_admins' => $count_admins,
        ]));
    }

    public function list_admins() {
        $list_admins = User::getAdmins();

        return view("admin/admins_list", with([
            'list_admins' => $list_admins,
        ]));
    }

    public function categories() {
        return view("admin/categories");
    }

    public function products() {
        return view("admin/products");
    }
}
