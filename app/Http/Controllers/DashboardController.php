<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $count_admins = User::getAdmins()->count();
        $count_users = User::getUsers()->count();
        $count_categories = Category::all()->count();

        $data = compact([
            'count_admins',
            'count_users',
            'count_categories'
        ]);

        return view("admin/dashboard", $data);
    }
}
