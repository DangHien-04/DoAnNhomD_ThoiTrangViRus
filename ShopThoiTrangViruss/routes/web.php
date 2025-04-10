<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\User\detailsOrderController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Models\DetailsOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminUserController;


Route::get('/Home', [HomeController::class, 'indexHome'])->name('home.index');
Route::get('detailproduct', [HomeController::class, 'indexDetailProduct'])->name('product.indexDetailproduct');


// Register Client
Route::get('/register',[CustomerController::class,'indexRegister']);
Route::post('/register',[CustomerController::class,'authRegister'])->name('user.cus_register');

// Login client
Route::get('/login',[CustomerController::class,'indexLogin'])->name('user.indexlogin');
Route::post('/login',[CustomerController::class,'authLogin'])->name('user.cus_login');

// Logout
Route::get('/signout', [CustomerController::class, 'signOut'])->name('signout');

