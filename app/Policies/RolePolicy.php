<?php

namespace App\Policies;

use Spatie\Permission\Models\Role;
use App\Models\User;

use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $authUser): bool
    {
        return $authUser->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $authUser, Role $role): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $authUser): bool
    {
        return $authUser->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authUser, Role $role): bool
    {
        return $authUser->hasRole('admin');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $authUser, Role $role): bool
    {
        if (! $authUser->hasRole('admin'))
            {
            return false;
            } 
            return $role->name !=='admin';
   }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        //
    }
}
