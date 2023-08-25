<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;

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


Route::get('/', [FrontController::class, 'index']);
Route::get('category', [FrontController::class, 'category']);
Route::get('view-category/{name}', [FrontController::class, 'viewcategory']);
Route::get('category/{prod_name}', [FrontController::class, 'viewproducts']);
Route::get('category/{cate_name}/{prod_name}', [FrontController::class, 'viewproduct']);
Route::get('product-list', [FrontController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontController::class, 'searchProduct']);

Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::post('/add-to-cart',[CartController::class, 'addproduct']);

Route::get('load-wishlist-count',[WishlistController::class, 'wishlistcount']);
Route::post('/add-to-wishlist', [WishlistController::class, 'add']);



Route::middleware('auth')->group(function (){
    
    
    
    Route::get('deleteWishlist/{prod_id}', [WishlistController::class, 'deleteitem']);
    Route::get('wishlist', [WishlistController::class, 'index']);
    


    Route::post('delete-cart-item',[CartController::class, 'deleteproduct']);
    Route::post('update-cart',[CartController::class, 'updatecart']);
    Route::get('/cart',[CartController::class, 'viewcart']);
    
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('my-orders',[UserController::class, 'index']);
    Route::get('view-order/{id}',[UserController::class, 'view']);
    

    Route::post('add-rating',[RatingController::class, 'add']);
    Route::post('/add-review',[ReviewController::class, 'create']);
    Route::get('edit-review/{product_name}',[ReviewController::class, 'edit']);
    Route::PUT('/update-review',[ReviewController::class, 'update']);



    // Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);

});
Route::middleware(['auth', 'isAdmin'])->group(function(){
   Route::get('dashboard', [FrontendController::class, 'index']);
    // --------------------------------------------------------------
    // --------------------------------------------------------------
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('details-category/{id}', [CategoryController::class, 'details']);


    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-product', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
    Route::get('details-product/{id}', [ProductController::class, 'details']);


    Route::get('admins', [DashboardController::class, 'admins']);
    Route::get('add-admin', [DashboardController::class, 'add']);
    Route::post('insert-admin', [DashboardController::class, 'insert']);
    Route::put('update-admin/{id}', [DashboardController::class, 'update']);
    Route::get('edit-admin/{id}', [DashboardController::class, 'edit']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::put('details-users/{id}', [DashboardController::class, 'details']);
    Route::get('delete-user/{id}', [DashboardController::class, 'destroy']);
    
    
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::Put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

});

Auth::routes();

Route::get('/home', [FrontController::class, 'index'])->name('home');
