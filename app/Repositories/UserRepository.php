<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Create new User
     */
    public function create(array $new)
    {
        $user = new User();
        $user->name = $new['name'];
        $user->email = $new['email'];
        $user->password = $new['password'];
        $user->save();

        return $user;
    }

    /**
     * Get All Users
     */
    public function getAll()
    {
        return User::all();
    }

    /**
     * Get Users by name
     */
    public function getByName(string $username)
    {
        return User::where('name', $username)->first();
    }

    /**
     * Get Users by ID
     */
    public function getById(int $id)
    {
        return User::where('id', $id)->first();
    }

    /**
     * Update User by username
     */
    public function update(string $username, string $nama_kolom, string $update)
    {
        $user = User::where('username', $username)->first();

        if(!$user) {
            return null;
        }

        $user->$nama_kolom = $update;
        $user->save();

        return $user;
    }

    /**
     * Update Users row
     */
    public function updateRow(string $username, array $update)
    {
        $user = User::where('username', $username)->first();

        if(!$user) {
            return null;
        }

        $user->update($update);

        return $user;
    }

    /**
     * Delete user by username
     */
    public function delete(string $username)
    {
        $user = User::where('username', $username)->first();

        if(!$user) {
            return null;
        }

        $user->delete();

        return $user;
    }
}
