<?php

namespace App\Policies;

use App\Models\ObjekPajak;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ObjekPajakPolicy
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
    public function view(User $user, ObjekPajak $objekPajak): bool
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
    public function update(User $user, ObjekPajak $objekPajak): bool
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ObjekPajak $objekPajak): bool
    {
        return $user->role == 'admin';
    }

    public function deleteAny(User $user): bool
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ObjekPajak $objekPajak): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ObjekPajak $objekPajak): bool
    {
        return true;
    }
}
