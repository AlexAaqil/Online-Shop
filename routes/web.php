<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');


Route::get('/admin', [AuthController::class,'admin_login'])->name('admin_login');
Route::post('/admin', [AuthController::class,'admin_auth_login'])->name('admin_auth_login');
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard');

    Route::get('/admin/list', [AdminController::class,'list_admins'])->name('list_admins');
    Route::get('/admin/add', [AdminController::class,'get_add_admin'])->name('get_add_admin');
    Route::post('/admin/add', [AdminController::class,'post_add_admin'])->name('post_add_admin');
    Route::get('/admin/update/{id}', [AdminController::class,'get_update_admin'])->name('get_update_admin');
    Route::post('/admin/update/{id}', [AdminController::class,'post_update_admin'])->name('post_update_admin');
    Route::delete('/admin/delete/{id}', [AdminController::class,'delete_admin'])->name('delete_admin');

    Route::get('/admin/categories', [CategoryController::class, 'list_categories'])->name('list_categories');
    Route::get('/admin/categories/add', [CategoryController::class, 'get_add_category'])->name('get_add_category');
    Route::post('/admin/categories/add', [CategoryController::class, 'post_add_category'])->name('post_add_category');
    Route::get('/admin/categories/update/{id}', [CategoryController::class, 'get_update_category'])->name('get_update_category');
    Route::post('/admin/categories/update/{id}', [CategoryController::class, 'post_update_category'])->name('post_update_category');
    Route::delete('/admin/categories/delete{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

    Route::get('/admin/products', [AdminController::class,'products'])->name('admin_products');
    Route::get('/admin/logout', [AuthController::class,'admin_logout'])->name('admin_logout');
});
