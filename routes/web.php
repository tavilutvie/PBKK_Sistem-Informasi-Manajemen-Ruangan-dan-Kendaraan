<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\RuanganController;
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

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index']);
Route::get('/about', [DashboardController::class, 'about']);
Route::get('/login', [DashboardController::class, 'login'])->middleware(['guest'])->name('login');
Route::get('/register', [DashboardController::class, 'register'])->middleware(['guest'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/roomList', [RuanganController::class, 'list']);
Route::get('/roomDetail', [RuanganController::class, 'detail']);
Route::get('/roomSchedule', [RuanganController::class, 'schedule'])->middleware(['auth'])->name('schedule');

Route::get('/vehicleList', [KendaraanController::class], 'list');
Route::get('/vehicleSchedule', [KendaraanController::class], 'schedule')->middleware(['auth'])->name('schedule');

Route::get('/admin', [DashboardController::class], 'admin')->middleware(['auth'])->name('admin');

Route::get('/roomList', function () {
    return view('/room/roomList', [
        "page" => "roomList"
    ]);
});

Route::get('/vehicleList', function () {
    return view('/vehicle/vehicleList', [
        "page" => "vehicleList"
    ]);
});

Route::get('/orderList', function () {
    return view('/order/orderList', [
        "page" => "orderList"
    ]);
});


