<?php

namespace App\Policies;

use App\Models\LaporPajak;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LaporPajakPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role == 'wp'; 
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LaporPajak $laporPajak): bool
    {
        return $user->role == 'wp';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'wp';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LaporPajak $laporPajak): bool
    {
        return $user->role == 'wp';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LaporPajak $laporPajak): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LaporPajak $laporPajak): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LaporPajak $laporPajak): bool
    {
        return false;
    }
}
