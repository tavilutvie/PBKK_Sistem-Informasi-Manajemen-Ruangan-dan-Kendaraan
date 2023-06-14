<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AkunServiceProvider;
use App\Services\AuthServiceProvider;
use App\Services\UserServiceProvider;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceProvider $authServiceProvider,
        private AkunServiceProvider $akunServiceProvider,
        private UserServiceProvider $userServiceProvider
    )
    {}

    /**
     * Register user (POST Method)
     */
    public function register(Request $request) {
        $is_valid_user = $this->userServiceProvider->validateUser($request);
        $is_valid_akun = $this->akunServiceProvider->validateAkun($request);

        if (!$is_valid_user || !$is_valid_akun) return redirect('/register')->with('error', 'Registration failed!');

        // save data
        $this->userServiceProvider->saveUser($is_valid_user);

        // get user id
        $user_id = $this->userServiceProvider->getUserIdByUsername($is_valid_user['name']);

        // save akun with given user id
        $this->akunServiceProvider->saveAkun($user_id, $is_valid_akun);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    /**
     * Login user (POST Method)
     */
    public function login(Request $request) {
        $login_result = $this->authServiceProvider->loginAuth($request);

        if (!$login_result) return redirect('/login')->with('error', 'Login failed!');
        return redirect('/')->with('success', 'Login successful!');
    }

    /**
     * Logout user (POST Method)
     */
    public function logout() {
        $logout_result = $this->authServiceProvider->logoutAuth();

        return redirect('/')->with('success', 'Logout successful!');
    }
}
