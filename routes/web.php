<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Domain\KendaraanController;
use App\Http\Controllers\Domain\RuanganController;
use App\Http\Controllers\Domain\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::get('/logout', 'logout')->middleware(['auth'])->name('logout');
    Route::post('/register', 'register')->middleware(['guest']);
    Route::post('/login', 'login')->middleware(['guest']);
});

Route::controller(DashboardController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/login', 'login')->middleware(['guest'])->name('login');
    Route::get('/register', 'register')->middleware(['guest'])->name('register');
});

Route::controller(RuanganController::class)->group(function() {
    Route::get('/roomList', 'list')->name('roomList');
    Route::get('/roomList/{id}', 'detail')->name('roomDetail');
    Route::get('/roomList/{id}/schedule/{month}/{year}', 'schedule')->middleware(['auth'])->name('roomSchedule');
});

Route::controller(KendaraanController::class)->group(function() {
    Route::get('/vehicleList', 'list')->name('vehicleList');
    Route::get('/vehicleList/{id}/schedule/{month}/{year}', 'schedule')->middleware(['auth'])->name('vehicleSschedule');
});

Route::controller(OrderController::class)->group(function() {
    Route::get('/orderList', 'list')->middleware(['auth'])->name('orderList');
    Route::get('{id}/orderRuangan', 'orderRuanganView')->middleware(['auth', 'verified'])->name('orderRuanganView');
    Route::get('{id}/orderKendaraan', 'orderKendaraanView')->middleware(['auth', 'verified'])->name('orderKendaraanView');
    Route::post('/orderRuangan', 'orderRuangan')->middleware(['auth'])->name('orderRuangan');
    Route::post('/orderKendaraan', 'orderKendaraan')->middleware(['auth'])->name('orderKendaraan');
    Route::post('/uploadDokumenRuangan/{id}', 'uploadDokumenRuangan')->middleware(['auth'])->name('uploadDokumenRuangan');
    Route::post('/uploadDokumenKendaraan/{id}', 'uploadDokumenKendaraan')->middleware(['auth'])->name('uploadDokumenKendaraan');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index')->middleware(['auth', 'admin'])->name('admin');
    Route::get('/adminVerifyAccount', 'getUnverified')->middleware(['auth', 'admin'])->name('adminVerifyAccount');
    Route::post('/adminVerifyAccount', 'verify')->middleware(['auth', 'admin'])->name('verifyAccount');
    Route::get('/adminLog', 'adminLog')->middleware(['auth', 'admin'])->name('adminLog');
    Route::get('/adminLog/export', 'export')->middleware(['auth', 'admin'])->name('export');
    Route::post('/admin/updateRuangan/{id}', 'updateRuangan')->middleware(['auth', 'admin'])->name('updateRuangan');
    Route::post('/admin/updateKendaraan/{id}', 'updateKendaraan')->middleware(['auth', 'admin'])->name('updateKendaraan');
});
