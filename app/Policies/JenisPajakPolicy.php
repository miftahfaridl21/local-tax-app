<?php

namespace App\Policies;

use App\Models\JenisPajak;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JenisPajakPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisPajak $jenisPajak): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisPajak $jenisPajak): bool
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisPajak $jenisPajak): bool
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
    public function restore(User $user, JenisPajak $jenisPajak): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisPajak $jenisPajak): bool
    {
        return true;
    }
}
