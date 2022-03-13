<?php

use App\Http\Controllers\AuditTrailController;
use App\Http\Controllers\BilAgensiLuarController;
use App\Http\Controllers\BilMajlisController;
use App\Http\Controllers\KutipanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyelenggaraanController;
use App\Http\Controllers\PenyeliaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::redirect('/', '/login');

Route::get('/', function() {
    return view('welcome');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth'])->name('dashboard');

//kutipan
Route::resource('/kutipan',KutipanController::class);

//transaksi
Route::resource('/transaksi', TransaksiController::class);

//bilMajlis
Route::resource('/bilMajlis', BilMajlisController::class);

//bilAgensiLuar
Route::resource('/bilAgensiLuar', BilAgensiLuarController::class);

//


//audit
Route::resource('/audit', AuditTrailController::class);

//pembayaran
Route::resource('/pembayaran',PembayaranController::class);


//penyelia
Route::resource('/penyelia', PenyeliaController::class);

//penyelenggeraan
Route::resource('/penyelenggaraan', PenyelenggaraanController::class);

//laporan
Route::resource('/laporan', LaporanController::class);

//user
Route::resource('/user', UserController::class);


Route::get('/user', [UserController::class, 'index']);
require __DIR__.'/auth.php';
