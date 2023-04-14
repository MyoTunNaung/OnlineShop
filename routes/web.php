<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Category
Route::get('/admin/category/list', [App\Http\Controllers\CategoryController::class, 'listCategory'])->middleware('auth');
Route::post('/admin/category/add', [App\Http\Controllers\CategoryController::class, 'createCategory'])->middleware('auth');
Route::get('/admin/category/del/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->middleware('auth');
Route::get('/admin/category/upd/{id}', [App\Http\Controllers\CategoryController::class, 'updCategory'])->middleware('auth');
Route::post('/admin/category/upd/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->middleware('auth');
//Category

//Item
Route::get('/admin/item/list', [App\Http\Controllers\ItemController::class, 'listItem'])->middleware('auth');
Route::post('/admin/item/add', [App\Http\Controllers\ItemController::class, 'createItem'])->middleware('auth');
Route::get('/admin/item/del/{id}', [App\Http\Controllers\ItemController::class, 'deleteItem'])->middleware('auth');
Route::get('/admin/item/upd/{id}', [App\Http\Controllers\ItemController::class, 'updItem'])->middleware('auth');
Route::post('/admin/item/upd/{id}', [App\Http\Controllers\ItemController::class, 'updateItem'])->middleware('auth');
//Item

//Product
Route::get('/admin/product/list', [App\Http\Controllers\ProductController::class, 'listProduct'])->middleware('auth');
Route::post('/admin/product/add', [App\Http\Controllers\ProductController::class, 'createProduct'])->middleware('auth');
Route::get('/admin/product/del/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->middleware('auth');
Route::get('/admin/product/upd/{id}', [App\Http\Controllers\ProductController::class, 'updProduct'])->middleware('auth');
Route::post('/admin/product/upd/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->middleware('auth');
//Product

//Category View
Route::get('/product/category/view/{id}', [App\Http\Controllers\ProductController::class, 'categoryView']);
//Category View

//Item View
Route::get('/product/item/view/{id}', [App\Http\Controllers\ProductController::class, 'itemView']);
//Item View

//Detail View
Route::get('/product/detail/view/{id}', [App\Http\Controllers\ProductController::class, 'detailView']);
//Detail View

//addToCartQty
Route::get('/product/addToCartQty/{id}',[App\Http\Controllers\ProductController::class, 'getAddToCartQty']);
//addToCartQty

//shoppingCart
Route::get('/product/shoppingCart',[App\Http\Controllers\ProductController::class, 'getCart']);
//shoppingCart


//Plus (+) shoppingCart
Route::get('/product/addToCart/{id}',[App\Http\Controllers\ProductController::class, 'getAddToCart']);
//Plus (+) shoppingCart

//Minus (-) shoppingCart
Route::get('/product/subToCart/{id}',[App\Http\Controllers\ProductController::class, 'getSubToCart']);
//Minus (-) shoppingCart

//Remove shoppingCart
Route::get('/product/removeFromCart/{id}',[App\Http\Controllers\ProductController::class, 'getRemoveFromCart']);
//Remove shoppingCart

//Clear shoppingCart
Route::get('/product/clearCart',[App\Http\Controllers\ProductController::class, 'getClearCart']);
//Clear shoppingCart

//Order
Route::get('/order',[App\Http\Controllers\ProductController::class, 'getOrder'])->middleware('auth');
//Order

//Payment
Route::get('/payment',[App\Http\Controllers\ProductController::class, 'getPayment']);
Route::post('/payment',[App\Http\Controllers\ProductController::class, 'createPayment']);
//Payment

//Search
Route::get('/q',[App\Http\Controllers\ProductController::class, 'searchProduct']);
//Search

//ajax route 
Route::get('/getItems',[App\Http\Controllers\ProductController::class, 'getItems']);
//ajax route 