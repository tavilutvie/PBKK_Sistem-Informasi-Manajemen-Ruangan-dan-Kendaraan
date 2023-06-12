<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('Dashboard/index', [
            "page" => "Home"
        ]);
    }

    public function about() {
        return view('Dashboard/about', [
            "page" => "About"
        ]);
    }

    public function login() {
        return view('/Auth/login', [
            "page" => "Login"
        ]);
    }

    public function register() {
        return view('/Auth/register', [
            "page" => "Register"
        ]);
    }

    public function admin() {
        return view('/Dashboard/admin', [
            "page" => "Admin Page"
        ]);
    }
}
