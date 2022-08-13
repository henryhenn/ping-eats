<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardTransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\TransaksiController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('food/{id}', 'show')->name('detail')->middleware('auth');
    Route::get('food/pedagang/{id}', 'detailUser')->name('auth.detail');
});

Route::controller(LokasiController::class)->group(function () {
    Route::get('lokasi', 'index')->name('lokasi.index');
});

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', 'register')->name('auth.register');
        Route::post('register', 'store')->name('auth.store');
        Route::get('login', 'login')->name('auth.login');
        Route::post('login', 'authenticate')->name('auth.authenticate');
    });

    Route::post('logout', 'logout')->name('auth.logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardProdukController::class)
        ->parameter('dashboard', 'produkDagang')
        ->except(['show', 'create', 'edit']);

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi-pembeli', 'index')->name('transaksi-pembeli.index');
        Route::post('payment', 'payment')->name("payment");
        Route::post('ping/{produk_id}', 'ping')->middleware('auth')->name('ping');
    });

    Route::resource('profil', DashboardProfilController::class)->parameter('profil', 'user')->only(['index', 'update']);
    Route::resource('transaksi', DashboardTransaksiController::class)->only(['index', 'update']);
//    Route::get('getTransaksi', [DashboardTransaksiController::class, 'getTransaksi'])->middleware('auth');
});
