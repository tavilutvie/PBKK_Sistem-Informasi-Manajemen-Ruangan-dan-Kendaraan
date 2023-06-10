<?php

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

Route::post('/register', [

]);

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


