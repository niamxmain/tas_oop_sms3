<?php

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

Route::get('/sales', [SaleController::class, 'index'])->name('/sales');

Route::get('/addsale', [SaleController::class, 'addsale'])->name('/addsale');
Route::post('/insertdata', [SaleController::class, 'insertdata'])->name('/insertdata');
