<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\GiatsmtController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Ormas\DataOrmasController;
use \App\Http\Controllers\Ormas\KirimOrmasController;
use App\Http\Controllers\Bidang\DataBidangController;
use App\Http\Controllers\Admin\LaporanAdminController;
use \App\Http\Controllers\Ormas\DokumenOrmasController;
use \App\Http\Controllers\Ormas\PengurusOrmasController;
use App\Http\Controllers\Admin\AlurPersyaratanController;
use App\Http\Controllers\Admin\SyaratAdministrasiController;


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


// // HALAMAN FRONTEND
// Route::get('/', function () {
//     return view('frontend.home');
//     // return redirect()->route('login');
// })->name('home');

Route::get('/', [GuestController::class, 'persyaratan'])->name('home');

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
    Route::get('/syarat',[SyaratAdministrasiController::class,'index'])->name('data-syarat');
    Route::get('/alur-persyaratan', [AlurPersyaratanController::class, 'index'])->name('alur-persyaratan');
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::get('/laporan-semester', [LaporanController::class, 'index'])->name('laporan-semester');
    Route::get('/laporan-admin', [LaporanAdminController::class, 'index'])->name('laporan-admin');
    Route::get('/export_xlsx', [LaporanAdminController::class, 'export_xlsx'])->name('export_xlsx');
    Route::get('/export_csv', [LaporanAdminController::class, 'export_csv'])->name('export_csv');
    Route::get('/export_pdf', [LaporanAdminController::class, 'export_pdf'])->name('export_pdf');
    Route::get('/user_pdf', [LaporanController::class, 'export_pdf'])->name('user_pdf');

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
