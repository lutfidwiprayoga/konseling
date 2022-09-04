<?php

use App\Http\Controllers\Admin\RekapDataController as AdminRekapDataController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\Konselor\JadwalController as KonselorJadwalController;
use App\Http\Controllers\Konselor\RekapDataController;
use App\Http\Controllers\Mahasiswa\KonsultasiController;
use App\Http\Controllers\Mahasiswa\LihatJadwalController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', [LoginController::class, 'index']);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/editprofil', [UpdateProfileController::class, 'edit'])->name('profil.edit');
Route::post('/editprofil', [UpdateProfileController::class, 'update'])->name('profil.update');
Route::post('/updatepassword', [UpdateProfileController::class, 'updatePassword'])->name('password.ganti');
Route::resource('/dashboard', DashboardController::class);

Route::prefix('mahasiswa')->group(function () {
    Route::resource('/konsultasi', KonsultasiController::class);
    Route::get('/lihatjadwal', [LihatJadwalController::class, 'lihatJadwal'])->name('mahasiswa.lihatjadwal');
});
Route::prefix('konselor')->group(function () {
    Route::resource('/jadwal', KonselorJadwalController::class);
    Route::get('/rekapdata', [RekapDataController::class, 'index'])->name('konselor.rekapdata');
});
Route::prefix('admin')->group(function () {
    Route::resource('/rekapdata-admin', AdminRekapDataController::class);
    Route::resource('/user', UserController::class);
});
