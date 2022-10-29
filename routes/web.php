<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);


Route::resource('sewa', SewaController::class);
Route::get('sewa/cetak/cetakdatasewa', [SewaController::class, 'cetakdatasewa'])->name('cetak-sewa');
Route::get('/add/sewa', function () {
    return view('CRUD Sewa.addsewa',[
            "tittle" => "Tambah Data Sewa"
        ]);
});

Route::get('/laporan-per-tanggal/sewa', function () {
    return view('CRUD Sewa.cetaksewa',[
            "tittle" => "Cetak Data Sewa"
        ]);
});
Route::get('sewa/cetak/cetakdatasewa-pertanggal/{tglawal}/{tglakhir}', [SewaController::class, 'cetakpertanggal'])->name('cetak-data-pertanggal');
Route::get('sewa/cetak/cetak-detail-datasewa/{sewa}', [SewaController::class, 'cetakdetaildatasewa'])->name('cetak-sewa');

// ===============================================
// MOBIL
Route::resource('mobil', MobilController::class);
Route::get('mobil/cetak/cetakdatamobil', [MobilController::class, 'cetakdatamobil'])->name('cetak-mobil');
Route::get('/add/mobil', function () {
    return view('CRUD Mobil.addmobil',[
            "tittle" => "Tambah Data Mobil"
        ]);
});

Route::get('/laporan-per-tanggal/mobil', function () {
    return view('CRUD mobil.cetakmobil',[
            "tittle" => "Cetak Data Mobil"
        ]);
});
Route::get('mobil/cetak/cetakdatamobil-pertanggal/{tglawal}/{tglakhir}', [MobilController::class, 'cetakpertanggal'])->name('cetak-data-pertanggal');
Route::get('mobil/cetak/cetak-detail-datamobil/{mobil}', [MobilController::class, 'cetakdetaildatamobil'])->name('cetak-mobil');


// ===========================================
// ADMIN
Route::resource('admin', AdminController::class);
Route::get('admin/cetak/cetakdataadmin', [AdminController::class, 'cetakdataadmin'])->name('cetak-admin');
Route::get('/add/admin', function () {
    return view('CRUD admin.addadmin',[
            "tittle" => "Tambah Data Admin"
        ]);
});

Route::get('/laporan-per-tanggal/admin', function () {
    return view('CRUD admin.cetakadmin',[
            "tittle" => "Cetak Data Admin"
        ]);
});
Route::get('admin/cetak/cetakdataadmin-pertanggal/{tglawal}/{tglakhir}', [AdminController::class, 'cetakpertanggal'])->name('cetak-data-pertanggal');
Route::get('admin/cetak/cetak-detail-dataadmin/{admin}', [AdminController::class, 'cetakdetaildataadmin'])->name('cetak-admin');


// ==============================================
// PELANGGAN
Route::resource('pelanggan', PelangganController::class);
Route::get('pelanggan/cetak/cetakdatapelanggan', [PelangganController::class, 'cetakdatapelanggan'])->name('cetak-pelanggan');
Route::get('/add/pelanggan', function () {
    return view('CRUD pelanggan.addpelanggan',[
            "tittle" => "Tambah Data Pelanggan"
        ]);
});

Route::get('/laporan-per-tanggal/pelanggan', function () {
    return view('CRUD pelanggan.cetakpelanggan',[
            "tittle" => "Cetak Data Pelanggan"
        ]);
});
Route::get('pelanggan/cetak/cetakdatapelanggan-pertanggal/{tglawal}/{tglakhir}', [PelangganController::class, 'cetakpertanggal'])->name('cetak-data-pertanggal');
Route::get('pelanggan/cetak/cetak-detail-datapelanggan/{pelanggan}', [PelangganController::class, 'cetakdetaildatapelanggan'])->name('cetak-pelanggan');
