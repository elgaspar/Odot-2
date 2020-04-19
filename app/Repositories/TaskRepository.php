<?php

namespace App\Repositories;

use App\User;

class TaskRepository
{
    public function get(User $user, int $id)
    {
        return $user->tasks()->find($id);
    }

    public function forUser(User $user)
    {
        return $user->tasks()
            ->where('parent_id', null) //we get level 1 tasks only
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
