<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Bidang\DataBidangController;
use App\Http\Controllers\Ormas\DataOrmasController;
use App\Http\Controllers\Ormas\PengurusOrmasController;
use App\Http\Controllers\Ormas\DokumenOrmasController;
use App\Http\Controllers\Ormas\KirimOrmasController;
use App\Http\Controllers\Pengguna\PenggunaController;
use App\Http\Controllers\Pengguna\VerifikatorController;
use App\Http\Controllers\Penandatangan\PenandatanganController;
use App\Http\Controllers\Kecamatan\KecamatanController;
use App\Http\Controllers\Verifikasi\VerifikasiController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Survey\SurveyController;
use App\Http\Controllers\Surat\SuratController;
use App\Http\Controllers\Ttd\TtdController;
use App\Http\Controllers\Display\DisplayController;
use App\Http\Controllers\Excel\ExcelOrmasTerdaftar;
use App\Http\Controllers\Password\PasswordController;
use App\Http\Controllers\wTopdf\WordToPdfController;
use App\Http\Controllers\Template\TemplateSuratController;
use App\Http\Controllers\Perubahan\PerubahanController;
use App\Http\Controllers\Notif\NotifController;
use App\Http\Controllers\Rnomor\NomorRubahController;
use App\Http\Controllers\TtdPerubahan\TtdPerubahanController;
use App\Http\Controllers\Laporan\OrmasTerdaftarController;
use App\Http\Controllers\Excel\ExcelOrmasTerdaftarController;
use App\Http\Controllers\RLangsung\RubahLangsungController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Admin\LaporanAdminController;
use \App\Http\Controllers\Admin\AlurPersyaratanController;
use \App\Http\Controllers\Admin\SyaratAdministrasiController;
use App\Http\Controllers\Laporan\LaporanSemesterController;
use App\Http\Livewire\Admin\LaporanAdmin;





use Illuminate\Support\Facades\Artisan;


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
// Route::get('/', function () {
//     return view('auth.login');
// })->name('login');

Route::middleware(['auth', 'verified', 'roles:1,2,3,4,5'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/bidang', [DataBidangController::class, 'index'])->name('data-bidang');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('data-pengguna');
    Route::get('/verifikator', [VerifikatorController::class, 'index'])->name('data-verifikator');
    Route::get('/penandatangan', [PenandatanganController::class, 'index'])->name('data-penandatangan');
    Route::get('/report', [ReportController::class, 'index'])->name('data-report');

    Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('data-kecamatan');

    Route::get('/data-ormas', [DataOrmasController::class, 'index'])->name('data-ormas');
    Route::get('/pengurus-ormas', [PengurusOrmasController::class, 'index'])->name('pengurus-ormas');
    Route::get('/dokumen-ormas', [DokumenOrmasController::class, 'index'])->name('dokumen-ormas');
    Route::get('/kirim-ormas', [KirimOrmasController::class, 'index'])->name('kirim-ormas');
    Route::get('/list-verifikasi', [VerifikasiController::class, 'index'])->name('list-verifikasi');
    Route::get('/list-survey', [SurveyController::class, 'index'])->name('list-survey');
    Route::get('/list-surat', [SuratController::class, 'index'])->name('list-surat');

    Route::get('/pass-show', [PasswordController::class, 'index'])->name('pass-show');

    Route::get('/display/{path?}/{filename}', [DisplayController::class, 'displayImage'])->middleware('auth')->name('display');
    Route::get('/displayPDF/{path?}/{filename}', [DisplayController::class, 'displayPDF'])->middleware('auth')->name('displayPDF');

    Route::get('/cetak', [WordToPdfController::class, 'convertWordToPDF'])->name('cetak-surat');

    Route::get('/template', [TemplateSuratController::class, 'index'])->name('template-surat');

    Route::get('/ttd', [TtdController::class, 'index'])->name('ttd');
    Route::get('/ttd-perubahan', [TtdPerubahanController::class, 'index'])->name('ttdperubahan');

    Route::get('/perubahan', [PerubahanController::class, 'index'])->name('data-perubahan');
    Route::get('/notif-rubah', [NotifController::class, 'index'])->name('notif-rubah');
    Route::get('/nomer-perubahan', [NomorRubahController::class, 'index'])->name('nomer-perubahan');

    Route::get('/ormas-terdaftar', [OrmasTerdaftarController::class, 'index'])->name('ormas-terdaftar');
    Route::get('/ormas-kecamatan', [OrmasTerdaftarController::class, 'kecamatan'])->name('ormas-kecamatan');
    Route::get('/ormas-kelurahan', [OrmasTerdaftarController::class, 'kelurahan'])->name('ormas-kelurahan');

    Route::get('/rubah-langsung', [RubahLangsungController::class, 'index'])->name('rubah-langsung');
    Route::get('/rubah-persyaratan', [RubahLangsungController::class, 'persyaratan'])->name('rubah-persyaratan');
    Route::get('/rubah-pengurus', [RubahLangsungController::class, 'pengurus'])->name('rubah-pengurus');
    Route::get('/rubah-dokumen', [RubahLangsungController::class, 'dokumen'])->name('rubah-dokumen');

    Route::get('/syarat',[SyaratAdministrasiController::class,'index'])->name('data-syarat');
    Route::get('/alur-persyaratan', [AlurPersyaratanController::class, 'index'])->name('alur-persyaratan');
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::get('/laporan-semester', [LaporanController::class, 'index'])->name('laporan-semester');
    Route::get('/laporan-admin', [LaporanAdminController::class, 'index'])->name('laporan-admin');
    Route::get('/export_xlsx', [LaporanAdminController::class, 'export_xlsx'])->name('export_xlsx');
    Route::get('/export_csv', [LaporanAdminController::class, 'export_csv'])->name('export_csv');
    Route::get('/export_pdf', [LaporanAdminController::class, 'export_pdf'])->name('export_pdf');
    Route::get('/user_pdf', [LaporanController::class, 'export_pdf'])->name('user_pdf');



    Route::get('/storagelink', function(){
        Artisan::call('storage:link');
        return redirect('/');
    });
    
    Route::get('/optimize', function(){
        Artisan::call('optimize:clear');
        return redirect('/');
    });
    
    Route::get('/cache', function(){
        Artisan::call('view:cache');
        Artisan::call('config:cache');
        return redirect('/');
    });
    
    // Route::get('/publishlivewire', function(){
    //     Artisan::call('livewire:publish --config');
    //     Artisan::call('php artisan livewire:publish --assets');
    //     return redirect('/');
    // });
});
