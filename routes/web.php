<?php

use App\Http\Controllers\Customer_Controller;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Product_Controller;
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

Route::get('/', [Home_Controller::class, 'index'])->name('index');
Route::post('/login', [Home_Controller::class, 'login'])->name('login');
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [Home_Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [Home_Controller::class, 'logout'])->name('logout');

    Route::get('/Customer',[Customer_Controller::class, 'customer_list'])->name('customer.list');
    Route::post('/Customer/create',[Customer_Controller::class, 'customer_add'])->name('customer.add');
    Route::get('/Product',[Product_Controller::class, 'product_list'])->name('product.list');
    Route::post('/Product/create',[Product_Controller::class, 'product_add'])->name('product.add');
});
