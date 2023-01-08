<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

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
// SALES
// tampildata senua
Route::get('/sales', [SaleController::class, 'index'])->name('/sales');
// tambahdata
Route::get('/addsale', [SaleController::class, 'addsale'])->name('/addsale');
Route::post('/insertdata', [SaleController::class, 'insertdata'])->name('/insertdata');
// editdata
Route::get('/getdata/{id}', [SaleController::class, 'getdata'])->name('/getdata');
Route::post('/updatedata/{id}', [SaleController::class, 'updatedata'])->name('/updatedata');
// deletedata
Route::get('/deletedata/{id}', [SaleController::class, 'deletedata'])->name('/deletedata');
// export excel
Route::get('/exportexcel', [SaleController::class, 'exportexcel'])->name('/exportexcel');
// import data excel
Route::post('/importexcel', [SaleController::class, 'importexcel'])->name('/importexcel');
// cetak pdf
Route::get('/cetakpdf', [SaleController::class, 'cetakpdf'])->name('/cetakpdf');

// PRODUCT
// tampil produk
Route::get('/product', [ProductController::class, 'index'])->name('/product');
// tambah produk
Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('/addproduct');
Route::post('/insertdataproduct', [ProductController::class, 'insertdataproduct'])->name('/insertdataproduct');
