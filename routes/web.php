<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'indexRegister']);
Route::post('/register', [AuthController::class, 'storeRegister']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/find', [AuthController::class, 'indexFind']);
Route::post('/find', [AuthController::class, 'find']);

Route::get('/pendaftaran/{no}', [PendaftaranController::class, 'get']);
Route::resource('/siswa', SiswaController::class)->middleware('auth');
Route::resource('/pendaftaran', PendaftaranController::class)->middleware('auth');
Route::resource('/pembayaran', PembayaranController::class)->middleware('auth');
Route::resource('/profile', ProfileController::class)->middleware('auth');

Route::get('/laporan-siswa', [LaporanController::class, 'laporanSiswa'])->middleware('auth');
Route::get('/laporan-siswa-cetak', [LaporanController::class, 'indexLaporanSiswa'])->middleware('auth');
