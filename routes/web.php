<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\PassporthilangController;
use App\Http\Controllers\PassportrusakController;
use App\Http\Controllers\ArsippemeriksaanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PemeriksaanController;
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

Route::get('/',[PengajuanController::class,'index']);
Route::post('pengajuan/store',[PengajuanController::class,'store']);

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('rekap', [RekapController::class,'index']);
    Route::get('pemeriksaan/{id_jadwal}', [PemeriksaanController::class,'pemeriksaan']);
    Route::post('pemeriksaan/diperiksa', [PemeriksaanController::class,'diperiksa']);
    Route::get('pemeriksaan/berkas/{id_pengajuan}', [PemeriksaanController::class,'berkas']);
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/', [PenjadwalanController::class,'index']);
        Route::get('detail', [PenjadwalanController::class,'detail']);
        Route::get('batal/{id}', [PenjadwalanController::class,'batal']);
        Route::post('store', [PenjadwalanController::class,'store']);
    });
    Route::group(['prefix' => 'pengajuan-passport-hilang'], function () {
        Route::get('/', [PassporthilangController::class,'index']);
        Route::get('/edit-passport-hilang/{id}', [PassporthilangController::class,'edit']);
        Route::post('/update', [PassporthilangController::class,'update']);
        Route::get('/hapus-passport-hilang/{id}', [PassporthilangController::class,'destroy']);

    });
    Route::group(['prefix' => 'pengajuan-passport-rusak'], function () {
        Route::get('/', [PassportrusakController::class,'index']);
        Route::get('/edit-passport-rusak/{id}', [PassportrusakController::class,'edit']);
        Route::post('/update', [PassportrusakController::class,'update']);
        Route::get('/hapus-passport-rusak/{id}', [PassportrusakController::class,'destroy']);
    });
    Route::group(['prefix' => 'arsip-pemeriksaan'], function () {
        Route::get('/', [ArsippemeriksaanController::class,'index']);
        Route::post('delete', [ArsippemeriksaanController::class,'delete']);
    });
});