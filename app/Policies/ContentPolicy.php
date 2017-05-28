<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Gallery;

class ContentPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    public function score(User $currentUser, Gallery $gallery)
    {
        return !($currentUser->id === $gallery->get_user()->id);
    }
}
