<?php

namespace App\Policies;

use App\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //Determine whether the user can view other users.
    public function index(User $user)
    {
        return $user->is_admin;
    }

    //Determine whether the user can crate other users.
    public function store(User $user)
    {
        return $user->is_admin;
    }

    //Determine whether the user can update the model.
    public function update(User $user)
    {
        return $user->is_admin;
    }

    //Determine whether the user can delete the model.
    public function destroy(User $user)
    {
        return $user->is_admin;
    }
}
