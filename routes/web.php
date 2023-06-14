<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Domain\KendaraanController;
use App\Http\Controllers\Domain\RuanganController;
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
    Route::get('/vehicleList/{kendaraan:id_kendaraan}/schedule/{month}/{year}', 'schedule')->middleware(['auth'])->name('vehicleSschedule');
});

Route::controller(OrderController::class)->group(function() {
    Route::get('/orderList', 'list')->middleware(['auth'])->name('orderList');
    Route::post('{ruangan:id_ruangan}/orderRuangan', 'orderRuangan')->middleware(['auth'])->name('orderRuangan');
    Route::post('{kendaraan:id_kendaraan}/orderKendaraan', 'orderKendaraan')->middleware(['auth'])->name('orderKendaraan');
});
