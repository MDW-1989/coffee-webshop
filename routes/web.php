<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Order_ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//User Routes
Route::get('/users' , [UserController::class, 'index']);
Route::get("edit/{id}", [UserController::class,'edit']);
Route::post("/edit", [UserController::class,'update']);
Route::get("delete/{id}", [UserController::class,'delete']);
Route::get("users/create", [UserController::class,'create']);
Route::post("/users", [UserController::class,'store']);


//Product Controller Routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/hot_products', [ProductController::class, 'hot_index']);
Route::get('/cold_products', [ProductController::class, 'cold_index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/products/{prod}/edit', [ProductController::class, 'edit']);
Route::get('/customize/{prod}', [ProductController::class, 'customize']);
Route::match(['put','patch'], '/products/{prod}/edit', [ProductController::class, 'update']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{prod}', [ProductController::class, 'destroy']);


//Order Controller Routes
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/create', [OrderController::class, 'create']);
Route::get('/orders/{ord}/edit', [OrderController::class, 'edit']);
Route::match(['put','patch'], '/orders/{ord}/edit', [OrderController::class, 'update']);
Route::post('/orders', [OrderController::class, 'store']);
Route::delete('/orders/{ord}', [OrderController::class, 'destroy']);


//Order_Item Controller Routes
Route::get('/order_items', [Order_ItemController::class, 'index']);
Route::get('/order_items/create', [Order_ItemController::class, 'create']);
Route::get('/order_items/{ord_item}/edit', [Order_ItemController::class, 'edit']);
Route::match(['put','patch'], '/order_items/{ord_item}/edit', [Order_ItemController::class, 'update']);
Route::post('/order_items', [Order_ItemController::class, 'store']);
Route::delete('/order_items/{ord_item}', [Order_ItemController::class, 'destroy']);


//Cart Controller Routes
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


//Shopping Cart 
Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


//Shopping
Route::get('/products/autocomplete', [SearchController::class,'autocomplete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

