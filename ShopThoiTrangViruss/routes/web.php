<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\User\detailsOrderController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ManufacturerControllerUser;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use App\Models\DetailsOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/manufacture', [ManufacturerControllerUser::class, 'indexmanufacture'])->name('manufacture.indexmanufacture');
Route::get('deletemanufacturer', [ManufacturerController::class, 'deleteManufacturer'])->name('manufacturer.deletemanufacturer');
Route::get('updatemanufacturer', [ManufacturerController::class, 'indexUpdateManufacturer'])->name('manufacturer.updateindex');
Route::post('updatemanufacturer', [ManufacturerController::class, 'updateManufacturer'])->name('manufacturer.updateManufacturer');
Route::get('addmanufacturer', [ManufacturerController::class, 'indexAddManufacturer'])->name('manufacturer.addmanufacturer');
Route::post('addmanufacturer', [ManufacturerController::class, 'addManufacturer']);
Route::get('listmanufacturer', [ManufacturerController::class, 'indexManufacturer'])->name('manufacturer.listmanufacturer');
Route::get('dashboard', [CategoryController::class, 'dashboard']);

Route::get('category', [CategoryController::class, 'indexCategory'])->name('category.index');
Route::get('categorycreate', [CategoryController::class, 'indexcreateCategory'])->name('category.createindex');
Route::post('categorycreate', [CategoryController::class, 'createCategory'])->name('category.createCategory');
Route::get('categoryupdate', [CategoryController::class, 'indexupdateCategory'])->name('category.updateindex');
Route::post('categoryupdate', [CategoryController::class, 'updateCategory'])->name('category.updateCategory');
Route::get('categorydelete', [CategoryController::class, 'deleteCategory'])->name('category.deleteCategory');
Route::get('/Home', [HomeController::class, 'indexHome'])->name('home.index');
Route::get('detailproduct', [HomeController::class, 'indexDetailProduct'])->name('product.indexDetailproduct');
Route::post('addcard', [CartController::class, 'addCart'])->name('cart.addCard');
Route::get('mycard', [CartController::class, 'indexCard'])->name('cart.indexCart');
Route::post('mycard', [CartController::class, ''])->name('a');
Route::get('deleteproductcard', [CartController::class, 'deleteProductCart'])->name('cart.deleteproductcart');
// Register Client
Route::get('/register',[CustomerController::class,'indexRegister']);
Route::post('/register',[CustomerController::class,'authRegister'])->name('user.cus_register');

// Login client
Route::get('/login',[CustomerController::class,'indexLogin'])->name('user.indexlogin');
Route::post('/login',[CustomerController::class,'authLogin'])->name('user.cus_login');

// Logout
Route::get('/signout', [CustomerController::class, 'signOut'])->name('signout');

// List user Admin
Route::get('/listuser',[AdminUserController::class,'listUser'])->name('user.listuser');
//  Delete user admin
Route::get('deleteuser',[AdminUserController::class,'deleteUser'])->name('user.deleteUser');

// Update user admin
Route::get('/updateuser',[AdminUserController::class,'updateUser'])->name('user.updateUser');
Route::post('/updateuser',[AdminUserController::class,'postUpdateUser'])->name('user.postUpdateUser');

// List_user  Search User
route::get('/search',[AdminUserController::class,'searchUser'])->name('user.searchUser');