<?php

namespace App\Repositories;

use App\User;

class ProjectRepository
{
    public function get(User $user, int $id)
    {
        return $user->projects()->find($id);
    }

    public function forUser(User $user)
    {
        return $user->projects()
            // ->where('parent_id', null) //we get level 1 tasks only
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
