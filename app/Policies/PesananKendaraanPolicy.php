<?php

namespace App\Policies;

use App\Models\PesananKendaraan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PesananKendaraanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PesananKendaraan $pesananKendaraan): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PesananKendaraan $pesananKendaraan): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PesananKendaraan $pesananKendaraan): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PesananKendaraan $pesananKendaraan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PesananKendaraan $pesananKendaraan): bool
    {
        //
    }
}
