<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;

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
    return view('v_home');
});

// Route::view('/guru', 'v_guru');
// Route::view('/siswa', 'v_siswa');
// Route::view('/user', 'v_user');
Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hak akses untuk admin
Route::group(['middleware' => 'admin'], function () 
{
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
    Route::get('/guru/add', [GuruController::class, 'add']);
    Route::post('/guru/insert', [GuruController::class, 'insert']);
    Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
    Route::get('/guru/delete/{id_guru}', [GuruController::class, 'delete']);
    Route::get('/siswa', [SiswaController::class, 'index']);
});

Route::group(['middleware' => 'user'], function () 
{
 
Route::get('/user', [UserController::class, 'index'])->name('user');
});

Route::group(['middleware' => 'pelanggan'], function ()
{
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/exportexcel', [PelangganController::class, 'exportexcel'])->name('exportexcel');
    Route::post('/importexcel', [PelangganController::class, 'importexcel'])->name('importexcel');

    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('/penjualan/print', [PenjualanController::class, 'print']);
    Route::get('/penjualan/printpdf', [PenjualanController::class, 'printpdf']);
});