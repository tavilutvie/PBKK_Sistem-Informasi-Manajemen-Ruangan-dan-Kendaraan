<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserServiceProvider
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    /**
     * Validate User
     */
    public function validateUser(Request $request) {
        $isValid = $request->validate([
            'name' => 'required|max:255|unique:users|min:4|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        return $isValid;
    }

    /**
     * Get user ID by username
     */
    public function getUserIdByUsername(string $username) {
        return $this->userRepository->getByName($username)->id;
    }

    /**
     * Get user by ID
     */
    public function getUsernameById(int $id) {
        $user_data = $this->userRepository->getById($id);
        $username = $user_data->name;

        return $username;
    }

    /**
     * Save user
     */
    public function saveUser(array $new_data) {
        $this->userRepository->create($new_data);
    }
}
