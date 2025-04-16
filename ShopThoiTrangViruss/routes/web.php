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

Route::get('dashboard', [CategoryController::class, 'dashboard']);
Route::get('category', [CategoryController::class, 'indexCategory'])->name('category.index');
Route::get('categorycreate', [CategoryController::class, 'indexcreateCategory'])->name('category.createindex');
Route::post('categorycreate', [CategoryController::class, 'createCategory'])->name('category.createCategory');
Route::get('categoryupdate', [CategoryController::class, 'indexupdateCategory'])->name('category.updateindex');
Route::post('categoryupdate', [CategoryController::class, 'updateCategory'])->name('category.updateCategory');
Route::get('categorydelete', [CategoryController::class, 'deleteCategory'])->name('category.deleteCategory');
Route::get('listmanufacturer', [ManufacturerController::class, 'indexManufacturer'])->name('manufacturer.listmanufacturer');
Route::get('addmanufacturer', [ManufacturerController::class, 'indexAddManufacturer'])->name('manufacturer.addmanufacturer');
Route::post('addmanufacturer', [ManufacturerController::class, 'addManufacturer']);
Route::get('deletemanufacturer', [ManufacturerController::class, 'deleteManufacturer'])->name('manufacturer.deletemanufacturer');
Route::get('updatemanufacturer', [ManufacturerController::class, 'indexUpdateManufacturer'])->name('manufacturer.updateindex');
Route::post('updatemanufacturer', [ManufacturerController::class, 'updateManufacturer'])->name('manufacturer.updateManufacturer');
Route::get('listproduct', [ProductController::class, 'indexProduct'])->name('product.listproduct');
Route::get('addproduct', [ProductController::class, 'indexAddProduct'])->name('product.indexaddproduct');
Route::post('addproduct', [ProductController::class, 'addProduct'])->name('product.addproduct');
Route::get('deleteproduct', [ProductController::class, 'deleteProduct'])->name('product.deleteproduct');
Route::get('updateproduct', [ProductController::class, 'indexUpdateProduct'])->name('product.indexUpdateproduct');
Route::post('updateproduct', [ProductController::class, 'updateProduct'])->name('product.updateproduct');
Route::get('/Home', [HomeController::class, 'indexHome'])->name('home.index');
Route::get('detailproduct', [HomeController::class, 'indexDetailProduct'])->name('product.indexDetailproduct');
Route::post('addcard', [CartController::class, 'addCart'])->name('cart.addCard');
Route::get('mycard', [CartController::class, 'indexCard'])->name('cart.indexCart');
Route::post('mycard', [CartController::class, ''])->name('a');
Route::get('deleteproductcard', [CartController::class, 'deleteProductCart'])->name('cart.deleteproductcart');
Route::get('myorder', [OrderController::class, 'addOrder'])->name('order.addOrder');
Route::get('payment', [PaymentController::class, 'paymentIndex'])->name('payment.paymentindex');
Route::get('detailsorder', [detailsOrderController::class, 'addDetailsOrder'])->name('detailsorder.addDetailsOrder');
Route::get('orderindex',[OrderController::class, 'orderIndex'])->name('order.orderIndex');
Route::get('detailsorderindex',[detailsOrderController::class, 'detailsOrderIndex'])->name('detailsorder.detailsOrderIndex');
Route::get('orderindexAdmin',[AdminOrderController::class, 'orderindexAdmin'])->name('admin.orderindexAdmin');
Route::get('admindetailsorderindex',[AdminOrderController::class, 'adminDetailsOrderIndex'])->name('admin.adminDetailsOrderIndex');
Route::get('admindetailsorderdelete',[AdminOrderController::class, 'adminDetailsOrderDelete'])->name('admin.adminDetailsOrderDelete');
Route::get('adminsearchorder',[AdminOrderController::class, 'adminSearchOrder'])->name('admin.adminSearchOrder');
Route::get('detailpost',[PostController::class, 'detailPost'])->name('post.detailpost');
Route::get('addpost',[PostController::class, 'indexAddPost'])->name('post.indexaddpost');
Route::post('addpost',[PostController::class, 'addPost'])->name('post.addpost');
Route::get('listpost',[PostController::class, 'listPost'])->name('post.listpost');
Route::get('listpostuser',[PostController::class, 'indexListPostUser'])->name('post.indexListPostUser');
Route::get('deletepost',[PostController::class, 'deletePost'])->name('post.deletepost');
Route::get('updatepost',[PostController::class, 'indexUpdatePost'])->name('post.indexupdatepost');
Route::post('updatepost',[PostController::class, 'updatePost'])->name('post.updatepost');
Route::post('searchpost',[PostController::class, 'searchPost'])->name('post.searchpost');
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