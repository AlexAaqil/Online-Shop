<?php

use \App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\HTTP\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [ShopController::class, 'categorised_products'])->name('categorised_products');

Route::get('/login', [AuthController::class, 'get_login'])->name('get_login');
Route::post('/login', [AuthController::class, 'post_login'])->name('post_login');
Route::get('/signup', [AuthController::class, 'get_signup'])->name('get_signup');
Route::post('/signup', [AuthController::class, 'post_signup'])->name('post_signup');


Route::get('/admin', [AuthController::class,'get_login'])->name('get_login');
Route::post('/admin', [AuthController::class,'post_login'])->name('post_login');
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('admin_dashboard');

    Route::get('/admin/list', [UserController::class,'list_admins'])->name('list_admins');
    Route::get('/admin/update/{id}', [UserController::class,'get_update_admin'])->name('get_update_admin');
    Route::post('/admin/update/{id}', [UserController::class,'post_update_admin'])->name('post_update_admin');
    Route::delete('/admin/delete/{id}', [UserController::class,'delete_admin'])->name('delete_admin');

    Route::get('/admin/users/list', [UserController::class, 'list_users'])->name('list_users');
    Route::get('/admin/users/update/{id}', [UserController::class,'get_update_user'])->name('get_update_user');
    Route::post('/admin/users/update/{id}', [UserController::class,'post_update_user'])->name('post_update_user');

    Route::get('/admin/categories', [CategoryController::class, 'list_categories'])->name('list_categories');
    Route::get('/admin/categories/add', [CategoryController::class, 'get_add_category'])->name('get_add_category');
    Route::post('/admin/categories/add', [CategoryController::class, 'post_add_category'])->name('post_add_category');
    Route::get('/admin/categories/update/{id}', [CategoryController::class, 'get_update_category'])->name('get_update_category');
    Route::post('/admin/categories/update/{id}', [CategoryController::class, 'post_update_category'])->name('post_update_category');
    Route::delete('/admin/categories/delete{id}', [CategoryController::class, 'delete_category'])->name('delete_category');


    Route::get('/admin/subcategories',[subcategorycontroller::class,'list_sub_categories'])->name('list_sub_categories');
    Route::get('/admin/subcategories/add',[SubcategoryController::class,'get_add_sub_category'])->name('get_add_sub_category');
    Route::post('/admin/subcategories/add',[SubcategoryController::class,'post_add_sub_category'])->name('post_add_sub_category');
    Route::get('/admin/subcategories/update/{id}',[SubcategoryController::class,'get_update_sub_category'])->name('get_update_sub_category');
    Route::post('/admin/subcategories/update/{id}',[SubcategoryController::class,'post_update_sub_category'])->name('post_update_sub_category');
    Route::delete('/admin/subcategories/delete/{id}',[SubCategoryController::class,'delete_sub_category'])->name('delete_sub_category');

    Route::get('/admin/brands', [BrandController::class, 'list_brands'])->name('list_brands');
    Route::get('/admin/brands/add', [BrandController::class, 'get_add_brand'])->name('get_add_brand');
    Route::post('/admin/brands/add', [BrandController::class, 'post_add_brand'])->name('post_add_brand');
    Route::get('/admin/brands/update/{id}', [BrandController::class, 'get_update_brand'])->name('get_update_brand');
    Route::post('/admin/brands/update/{id}', [BrandController::class, 'post_update_brand'])->name('post_update_brand');
    Route::delete('/admin/brands/delete/{id}', [BrandController::class, 'delete_brand'])->name('delete_brand');

    Route::get('/admin/products', [ProductController::class, 'list_products'])->name('list_products');
    Route::get('/admin/products/add', [ProductController::class, 'get_add_product'])->name('get_add_product');
    Route::post('/admin/products/add', [ProductController::class, 'post_add_product'])->name('post_add_product');
    Route::get('/admin/products/update/{id}', [ProductController::class, 'get_update_product'])->name('get_update_product');
    Route::post('/admin/products/update/{id}', [ProductController::class, 'post_update_product'])->name('post_update_product');
    Route::delete('/admin/products/delete/{id}', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::get('/admin/products/delete_product_image/{id}', [ProductController::class, 'delete_product_image'])->name('delete_product_image');
    Route::post('/admin/products/product_images_sort', [ProductController::class, 'product_images_sort'])->name('product_images_sort');
});

Route::get('/logout', [AuthController::class,'logout'])->name('logout');
