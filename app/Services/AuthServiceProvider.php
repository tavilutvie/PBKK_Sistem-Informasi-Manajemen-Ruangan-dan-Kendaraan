<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Services\AkunServiceProvider;
use App\Services\UserServiceProvider;
use Illuminate\Http\Request;

class AuthServiceProvider
{
    public function __construct(
        private AkunServiceProvider $akunServiceProvider,
        private UserServiceProvider $userServiceProvider
    ) {}
    /**
     * Register user
     */
    public function registerUser(Request $request) {
        $is_valid_user = $this->userServiceProvider->validateUser($request);
        $is_valid_akun = $this->akunServiceProvider->validateAkun($request);

        if (!$is_valid_user) return false;
        if (!$is_valid_akun) return false;

        $imagePath = "";
        if ($request->hasFile('foto_tanda_pengenal')) {
            $image = $request->file('foto_tanda_pengenal');
            $filename = time(). '-'. str_replace(' ', '_', $image->getClientOriginalName());
            $image->storeAs('public/images/user_profile', $filename);

            // Get the image path
            $imagePath = 'storage/images/user_profile/' . $filename;
        }

        // change image to path
        $is_valid_akun['foto_tanda_pengenal'] = $imagePath;

        $is_valid_user['password'] = Hash::make($is_valid_user['password']);

        // Save User Data
        $this->userServiceProvider->saveUser($is_valid_user);

        // Get User ID
        $user_id = $this->userServiceProvider->getUserIdByUsername($is_valid_user['name']);

        // Save akun with given user id
        $this->akunServiceProvider->saveAkun($user_id, $is_valid_akun);

        return true;
    }

    /**
     * Login user
     */
    public function loginAuth(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validated)) {
            return true;
        }

        return false;
    }

    /**
     * Logout user
     */
    public function logoutAuth() {
        return auth()->logout() ? true : false;
    }
}
