<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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
Route::get('/login', [DashboardController::class, 'login']);
Route::get('/register', [DashboardController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/roomDetail', function () {
    return view('/room/roomDetail', [
        "page" => "roomDetail"
    ]);
});

Route::get('/admin', function () {
    return view('/dashboard/admin', [
        "page" => "Admin"
    ]);
});

Route::get('/schedule', function () {
    return view('/schedule/schedule', [
        "page" => "Schedule"
    ]);
});
