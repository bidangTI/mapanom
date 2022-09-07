<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Bidang\DataBidangController;
use App\Http\Controllers\Ormas\DataOrmasController;
use App\Http\Controllers\GiatsmtController;
use \App\Http\Controllers\Ormas\PengurusOrmasController;
use \App\Http\Controllers\Ormas\DokumenOrmasController;
use \App\Http\Controllers\Ormas\KirimOrmasController;


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


// HALAMAN FRONTEND
Route::get('/', function () {
    return view('frontend.home');
    // return redirect()->route('login');
})->name('home');

Route::group(['prefix' => 'guest', 'as' => 'guest.'], function () {
    Route::get('/daftar', [GuestController::class, 'pendaftaran'])->name('daftar');
    Route::get('/alur', [GuestController::class, 'alur'])->name('alur');
});


// HALAMAN BACKEND
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

Route::middleware(['auth', 'verified', 'roles:1,2,3'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/bidang', [DataBidangController::class, 'index'])->name('data-bidang');

    // ORMAS
    Route::get('/data-ormas', [DataOrmasController::class, 'index'])->name('data-ormas');
    Route::get('/pengurus-ormas', [PengurusOrmasController::class, 'index'])->name('pengurus-ormas');
    Route::get('/dokumen-ormas', [DokumenOrmasController::class, 'index'])->name('dokumen-ormas');
    Route::get('/kirim-ormas', [KirimOrmasController::class, 'index'])->name('kirim-ormas');

    //Laporan Kegiatan Ormas
    //Route::get('/data-giatsmt', [GiatsmtController::class, 'index'])->name('data-giatsmt');

    //Route::get('counter', [GiatsmtController::class, 'index'])->name('data-giatsmt');
    


    // PARPOL
    // Route::get('/data-parpol', function () {
    //     return view('backend.parpol.data-parpol');
    // })->name('data-parpol');

    // Route::get('/pengurus-parpol', function () {
    //     return view('backend.parpol.pengurus-parpol');
    // })->name('pengurus-parpol');

    // Route::get('/upload-parpol', function () {
    //     return view('backend.parpol.upload-parpol');
    // })->name('upload-parpol');
});
