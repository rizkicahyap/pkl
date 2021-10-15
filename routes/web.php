<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminSM1Controller;
use App\Http\Controllers\AdminFS1Controller;
use App\Http\Controllers\AdminKtgrController;
use App\Http\Controllers\DirDashController;
use App\Http\Controllers\DirSM1Controller;
use App\Http\Controllers\DirFS1Controller;
use App\Http\Controllers\DirKtgrController;
use App\Http\Controllers\DirPBController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\UserSM1Controller;
use App\Http\Controllers\UserFS1Controller;
use App\Http\Controllers\UserKtgrController;
use App\Http\Controllers\SAdminDashController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AuthController;

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


// coba 
Route::view('/', 'index');

// login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// auth
// auth->admin || user || direksi || superadmin
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['cek_login:admin']], function() {
        // admin dashboard
        Route::get('/admin', [AdminDashController::class, 'index']);

        // admin Data Surat
        Route::get('/admin/datasurat', [AdminSM1Controller::class, 'index']);
        Route::get('/admin/datasurat/buatsurat', [AdminSM1Controller::class, 'create']);
        Route::post('/admin/datasurat', [AdminSM1Controller::class, 'store']);
        Route::get('/admin/datasurat/{adminSM1}', [AdminSM1Controller::class, 'show']);
        Route::delete('/admin/datasurat/{adminSM1}', [AdminSM1Controller::class, 'destroy']);
        Route::get('/admin/datasurat/{adminSM1}/editsurat', [AdminSM1Controller::class, 'edit']);
        Route::patch('/admin/datasurat/{adminSM1}', [AdminSM1Controller::class, 'update']);
        Route::put('/admin/datasurat/aksesedit/{adminSM1}', [AdminSM1Controller::class, 'req_akses_edit']);
        Route::put('/admin/datasurat/aksesdelete/{adminSM1}', [AdminSM1Controller::class, 'req_akses_delete']);


        // admin FORMAT SURAT
        Route::get('/admin/formatsurat', [AdminFS1Controller::class, 'index']);
        Route::get('/admin/formatsurat/buatformat', [AdminFS1Controller::class, 'create']);
        Route::post('/admin/formatsurat', [AdminFS1Controller::class, 'store']);
        Route::get('/admin/formatsurat/{adminFS1}', [AdminFS1Controller::class, 'show']);
        Route::get('/admin/tampilformat/{adminFS1}', [AdminFS1Controller::class, 'show2']);
        Route::delete('/admin/formatsurat/{adminFS1}', [AdminFS1Controller::class, 'destroy']);
        Route::get('/admin/formatsurat/{adminFS1}/editformat', [AdminFS1Controller::class, 'edit']);
        Route::patch('/admin/formatsurat/{adminFS1}', [AdminFS1Controller::class, 'update']);


        // admin KATEGORI
        Route::get('/admin/kategori', [AdminKtgrController::class, 'index']);
        Route::get('/admin/kategori/buatkategori', [AdminKtgrController::class, 'create']);
        Route::post('/admin/kategori', [AdminKtgrController::class, 'store']);
        Route::delete('/admin/kategori/{adminKtgr}', [AdminKtgrController::class, 'destroy']);
        Route::get('/admin/kategori/{adminKtgr}/editkategori', [AdminKtgrController::class, 'edit']);
        Route::patch('/admin/kategori/{adminKtgr}', [AdminKtgrController::class, 'update']);
        Route::put('/admin/kategori/aksesedit/{adminKtgr}', [AdminKtgrController::class, 'req_akses_edit']);
        Route::put('/admin/kategori/aksesdelete/{adminKtgr}', [AdminKtgrController::class, 'req_akses_delete']);

    
    });
    
    Route::group(['middleware' => ['cek_login:user']], function() {
        // user dashboard
        Route::get('/user', [UserDashController::class, 'index']);

        // user Data Surat
        Route::get('/user/datasurat', [UserSM1Controller::class, 'index']);
        Route::get('/user/datasurat/buatsurat', [UserSM1Controller::class, 'create']);
        Route::post('/user/datasurat', [UserSM1Controller::class, 'store']);
        Route::get('/user/datasurat/{userSM1}', [UserSM1Controller::class, 'show']);
        
        // user FORMAT SURAT
        Route::get('/user/formatsurat', [UserFS1Controller::class, 'index']);
        Route::post('/user/formatsurat', [UserFS1Controller::class, 'store']);
        Route::get('/user/formatsurat/{userFS1}', [UserFS1Controller::class, 'show']);
        Route::get('/user/tampilformat/{userFS1}', [UserFS1Controller::class, 'show2']);

        // user KATEGORI
        Route::get('/user/kategori', [UserKtgrController::class, 'index']);

    });

    Route::group(['middleware' => ['cek_login:direksi']], function() {
        // direksi dashboard
        Route::get('/direksi', [DirDashController::class, 'index']);

        // direksi Data Surat
        Route::get('/direksi/datasurat', [DirSM1Controller::class, 'index']);
        Route::get('/direksi/datasurat/{dirSM1}', [DirSM1Controller::class, 'show']);


        // direksi FORMAT SURAT
        Route::get('/direksi/formatsurat', [DirFS1Controller::class, 'index']);
        Route::get('/direksi/formatsurat/{dirFS1}', [DirFS1Controller::class, 'show']);
        Route::get('/direksi/tampilformat/{dirFS1}', [DirFS1Controller::class, 'show2']);

        // user KATEGORI
        Route::get('/direksi/kategori', [DirKtgrController::class, 'index']);

        // direksi PERMINTAAN AKSES
        Route::get('/direksi/akses/datasurat', [DirSM1Controller::class, 'index2']);
        Route::put('/direksi/akses/datasurat/{dirSM1}', [DirSM1Controller::class, 'TERIMA']);
        Route::patch('/direksi/akses/datasurat/{dirSM1}', [DirSM1Controller::class, 'TOLAK']);

        Route::get('/direksi/akses/penggunabaru', [DirPBController::class, 'index']);
        Route::delete('/direksi/akses/penggunabaru/{dirPB}', [DirPBController::class, 'destroy']);
        Route::patch('/direksi/akses/penggunabaru/{dirPB}', [DirPBController::class, 'update']);

        Route::get('/direksi/akses/pengguna', [DirPBController::class, 'index2']);
        Route::put('/direksi/akses/pengguna/{dirPB}', [DirPBController::class, 'TERIMA']);
        Route::patch('/direksi/akses/pengguna/{dirPB}', [DirPBController::class, 'TOLAK']);

        Route::get('/direksi/akses/kategori', [DirKtgrController::class, 'index2']);
        Route::put('/direksi/akses/kategori/{dirKtgr}', [DirKtgrController::class, 'TERIMA']);
        Route::patch('/direksi/akses/kategori/{dirKtgr}', [DirKtgrController::class, 'TOLAK']);

    });

    Route::group(['middleware' => ['cek_login:superadmin']], function() {
        // superadmin dashboard
        Route::get('/superadmin', [SAdminDashController::class, 'index']);

        // superadmin pengguna
        Route::get('/superadmin/datapengguna', [PenggunaController::class, 'index']);
        Route::get('/superadmin/datapengguna/tambahpengguna', [PenggunaController::class, 'create']);
        Route::post('/superadmin/datapengguna', [PenggunaController::class, 'store']);
        Route::delete('/superadmin/datapengguna/{pengguna}', [PenggunaController::class, 'destroy']);
        Route::get('/superadmin/datapengguna/{pengguna}/editpengguna', [PenggunaController::class, 'edit']);
        Route::patch('/superadmin/datapengguna/{pengguna}', [PenggunaController::class, 'update']);
        Route::put('/superadmin/datapengguna/aksesedit/{pengguna}', [PenggunaController::class, 'req_akses_edit']);
        Route::put('/superadmin/datapengguna/aksesdelete/{pengguna}', [PenggunaController::class, 'req_akses_delete']);


    });

});






