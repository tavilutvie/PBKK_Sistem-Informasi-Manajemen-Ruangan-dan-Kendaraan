<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
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

Route::controller(AuthController::class)->group(function() {
    Route::get('/logout', 'logout')->middleware(['auth'])->name('logout');
    Route::post('/register', 'register')->middleware(['guest'])->name('register');
    Route::post('/login', 'login')->middleware(['guest'])->name('login');
});

Route::controller(DashboardController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/login', 'login')->middleware(['guest'])->name('login');
    Route::get('/register', 'register')->middleware(['guest'])->name('register');
});

// Route::post('/register', [RegisterController::class, 'store']);
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/logout', [LoginController::class, 'logout']);

// Route::get('/', [DashboardController::class, 'index']);
// Route::get('/about', [DashboardController::class, 'about']);
// Route::get('/login', [DashboardController::class, 'login'])->middleware(['guest'])->name('login');
// Route::get('/register', [DashboardController::class, 'register'])->middleware(['guest'])->name('login');

Route::get('/roomList', [RuanganController::class, 'list']);
Route::get('/roomList/{ruangan:id_ruangan}', [RuanganController::class, 'detail']);
Route::get('/roomList/{ruangan:id_ruangan}/schedule/{month}/{year}', [RuanganController::class, 'schedule'])->middleware(['auth'])->name('schedule');

Route::get('/vehicleList', [KendaraanController::class, 'list']);
Route::get('{kendaraan}/schedule', [KendaraanController::class, 'schedule'])->middleware(['auth'])->name('schedule');

Route::get('/orderList', [OrderController::class, 'list']);
Route::post('{ruangan}/orderRuangan', [OrderController::class, 'orderRuangan'])->middleware(['auth'])->name('orderRuangan');
Route::post('{kendaraan}/orderKendaraan', [OrderController::class, 'orderKendaraan'])->middleware(['auth'])->name('orderKendaraan');

Route::get('/admin', [DashboardController::class, 'admin'])->middleware(['auth'])->name('admin');


