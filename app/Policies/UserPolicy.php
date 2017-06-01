<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    public function score(User $currentUser, User $user)
    {
      return $currentUser->id !== $user->id;
    }

    public function up(User $currentUser, User $user)
    {
        return !($currentUser->id === $user->id);
    }
}
