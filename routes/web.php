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

Route::get('/roomDetail', function () {
    return view('/room/roomDetail', [
        "page" => "roomDetail"
    ]); 
});

Route::get('/vehicleDetail', function () {
    return view('/vehicle/vehicleDetail', [
        "page" => "vehicleDetail"
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