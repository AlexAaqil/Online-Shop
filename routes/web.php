<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/admin/categories', [AdminController::class,'categories'])->name('admin_categories');
    Route::get('/admin/products', [AdminController::class,'products'])->name('admin_products');
    Route::get('/admin/logout', [AuthController::class,'admin_logout'])->name('admin_logout');
});
