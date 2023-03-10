<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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
Route::post('/insertdatasales', [SaleController::class, 'insertdatasales'])->name('/insertdatasales');
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
Route::get('/products', [ProductController::class, 'index'])->name('/products');
// tambah produk
Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('/addproduct');
Route::post('/insertdataproducts', [ProductController::class, 'insertdataproducts'])->name('/insertdataproducts');
// edit data
Route::get('/getproduct/{id}', [ProductController::class, 'getproduct'])->name('/getproduct');
Route::post('/updateproduct/{id}', [ProductController::class, 'updateproduct'])->name('/updateproduct');
// delete product
Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('/deleteproduct');

//PURCHASES
//  tampil pembelian
Route::get('/purchases', [PurchaseController::class, 'index'])->name('/purchases');
// tambah pembeliam
Route::get('/addpurchase', [PurchaseController::class, 'addpurchase'])->name('/addpurchase');
Route::post('/insertdatapurchases', [PurchaseController::class, 'insertdatapurchases'])->name('/insertdatapurchases');
// edit pembelian
Route::get('/getpurchase/{id}', [PurchaseController::class, 'getpurchase'])->name('/getpurchase');
Route::post('/updatepurchase/{id}', [PurchaseController::class, 'updatepurchase'])->name('/updatepurchase');
//delete pembelian
Route::get('/deletepurchase/{id}', [PurchaseController::class, 'deletepurchase'])->name('/deletepurchase');
