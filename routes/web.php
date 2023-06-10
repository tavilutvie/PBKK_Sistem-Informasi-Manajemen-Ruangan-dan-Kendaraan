<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('/dashboard/index', [
        "page" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('/dashboard/about', [
        "page" => "About"
    ]);
});

Route::get('/login', function () {
    return view('/auth/login', [
        "page" => "Login"
    ]);
});

Route::get('/register', function () {
    return view('/auth/register', [
        "page" => "Register"
    ]); 
});

Route::post('/register', [RegisterController::class, 'store']);