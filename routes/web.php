<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
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
    return view('home');
});

Route::get('/barang',[BarangController::class,'index'])->name('barang');
Route::get('/transaksi',[PembelianController::class,'index'])->name('transaksi');
Route::get('/transaksi/create',[PembelianController::class,'create'])->name('transaksi.create');
Route::post('/transaksi/create',[PembelianController::class,'store'])->name('transaksi.store');
Route::get('/transaksi/{transaksi}',[PembelianController::class,'show'])->name('transaksi.show');