<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home');
});

//rute login register (by laravel)
Auth::routes();

//rute untuk ke halaman utama
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Ini rute untuk pemilik
Route::get('/daftarpemilik', [App\Http\Controllers\Auth\RegisterController::class, 'pemilik'])->name('pemilik');

//rute pemisah admin,pemilik,penyewa
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
Route::get('/pemilik', [App\Http\Controllers\PemilikController::class, 'index'])->name('index');

//rute navbar
Route::get('/pencarian', [App\Http\Controllers\PencarianController::class, 'pencarian'])->name('pencarian');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/sewaku', [App\Http\Controllers\HomeController::class, 'sewaku'])->name('sewaku');
Route::get('/FAQ', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');

//rute detail kos, pembayaran
Route::get('/detail', [App\Http\Controllers\PencarianController::class, 'detail'])->name('detail');
Route::get('/details/{id}', [App\Http\Controllers\SewaController::class, 'sewa'])->name('sewa');
Route::get('/bayar/{id}', [App\Http\Controllers\SewaController::class, 'bayar'])->name('bayar');
Route::get('/hapus/{id}', [App\Http\Controllers\SewaController::class, 'hapus'])->name('hapus');