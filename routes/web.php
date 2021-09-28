<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\PassporthilangController;
use App\Http\Controllers\PassportrusakController;
use App\Http\Controllers\ArsippemeriksaanController;
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
Route::resource('pengajuan', PengajuanController::class);

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/', [PenjadwalanController::class,'index']);
    });
    Route::group(['prefix' => 'pengajuan-passport-hilang'], function () {
        Route::get('/', [PassporthilangController::class,'index']);
    });
    Route::group(['prefix' => 'pengajuan-passport-rusak'], function () {
        Route::get('/', [PassportrusakController::class,'index']);
    });
    Route::group(['prefix' => 'arsip-pemeriksaan'], function () {
        Route::get('/', [ArsippemeriksaanController::class,'index']);
    });
});