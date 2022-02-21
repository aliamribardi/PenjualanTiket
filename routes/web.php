<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FTiketController;
use App\Http\Controllers\FCekoutController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\TiketController;
use App\Http\Controllers\admin\CekoutController;
use App\Http\Controllers\admin\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin
Auth::routes();



Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/tiket', TiketController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/cekout', CekoutController::class);

});
// End Admin
// Route::group(['middleware' => ['role:user|admin']], function() {});


// Front

Route::group(['middleware' => ['role:user']], function() {
    Route::get('/cekouts', [FCekoutController::class, 'index'])->name('Cekout');
    Route::get('/cekouts/detail/{id}', [FCekoutController::class, 'detail'])->name('detailCekout');
});




Route::get('/', [FTiketController::class, 'index'])->name('index');
Route::get('/cart', [CartController::class, 'index'])->name('ListCart');
Route::post('/cart', [CartController::class, 'AddToCart'])->name('Store');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('Update');
Route::post('/cart/remove', [CartController::class, 'removeCart'])->name('Remove');
Route::post('/cart/clear', [CartController::class, 'clearAllCart'])->name('Clear');


Route::post('/cart/db', [CartController::class, 'store'])->name('cart.db');





