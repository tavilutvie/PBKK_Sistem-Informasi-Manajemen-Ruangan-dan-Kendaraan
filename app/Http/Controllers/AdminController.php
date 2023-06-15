<?php

namespace App\Http\Controllers;

use App\Models\PesananRuangan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Dashboard/admin', [
            "page" => "Admin Homepage"
        ]);
    }
}
