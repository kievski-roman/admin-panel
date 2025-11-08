<?php

namespace App\Policies;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BusPolicy
{

    public function before(User $user, string $ability): ?bool
    {
        return $user->hasRole('admin') ? true : null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['manager', 'driver']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Bus $bus): bool
    {
        if ($user->hasRole('manager')) return true;


        if ($user->hasRole('driver')) {
            return (int)$bus->driver_id === (int)$user->driver?->id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bus $bus): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bus $bus): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bus $bus): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bus $bus): bool
    {
        return false;
    }
}
