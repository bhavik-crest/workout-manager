<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workout;

class WorkoutPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Workout $workout): bool
    {
        return $user->email === 'admin@example.com' || $user->id === $workout->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Workout $workout): bool
    {
        return $user->email === 'admin@example.com' || $user->id === $workout->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Workout $workout): bool
    {
        return $user->email === 'admin@example.com' || $user->id === $workout->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Workout $workout): bool
    {
        return $user->id === $workout->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Workout $workout): bool
    {
        return $user->id === $workout->user_id;
    }
} 