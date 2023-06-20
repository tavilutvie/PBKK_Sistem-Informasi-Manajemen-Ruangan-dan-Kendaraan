<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthServiceProvider;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceProvider $authServiceProvider,
    )
    {}

    /**
     * Register user (POST Method)
     */
    public function register(Request $request) {
        $register_result = $this->authServiceProvider->registerUser($request);

        if (!$register_result)
            return redirect('/register')->with('error', 'Registration failed!');


        return redirect('/login')->with('success', 'Registration successful!');
    }

    /**
     * Login user (POST Method)
     */
    public function login(Request $request) {
        $login_result = $this->authServiceProvider->loginAuth($request);

        if (!$login_result)
            return redirect('/login')->with('error', 'Login failed!');

        // check if admin
        if (!auth()->user()->akun->is_admin)
            return redirect('/')->with('success', 'Login successful!');

        return redirect('/admin')->with('success', 'Login successful!');
    }

    /**
     * Logout user (POST Method)
     */
    public function logout() {
        $logout_result = $this->authServiceProvider->logoutAuth();

        return redirect('/')->with('success', 'Logout successful!');
    }
}
