<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiKeluarController;
use App\Models\Satuan;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [LoginController::class,'index'] )->name('login');
Route::post('/login', [LoginController::class, 'proseslogin']);

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', 'DashboardController@index');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');

    // Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::resource('kategori', KategoriController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('transaksimasuk', TransaksiController::class);
    Route::resource('transaksikeluar', TransaksiKeluarController::class);
    Route::get('getdata',[TransaksiKeluarController::class,'getBarang']);
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::get('laporanmasuk', [LaporanController::class, 'laporanmasuk']);
    Route::get('laporankeluar', [LaporanController::class, 'laporankeluar']);
    Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);
    Route::resource('barang', BarangController::class);


    // Tambahkan rute lain yang memerlukan autentikasi di sini
});
