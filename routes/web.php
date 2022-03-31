<?php

use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SinvoiceController;
use App\Http\Controllers\InvoiceitemController;
use App\Http\Controllers\ReceiptinController;
use App\Http\Controllers\ReceiptoutController;


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

Route::resource('product', ProductController::class);

Route::resource('brand', BrandController::class);

Route::resource('client', ClientController::class);

Route::resource('price', PriceController::class);

Route::resource('item', ItemController::class);

Route::resource('invoice', InvoiceController::class);

Route::resource('invoiceitem', InvoiceitemController::class);

Route::resource('sinvoice', SinvoiceController::class);

Route::resource('receiptin', ReceiptinController::class);

Route::resource('receiptout', ReceiptoutController::class);

Route::get('balance', BalanceController::class)->name('balance');




// route::post('item', ItemController::class);


Route::get('/', function () {
    return view('home');
})->name('home');