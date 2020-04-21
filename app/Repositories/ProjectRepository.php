<?php

namespace App\Repositories;

use App\User;
use App\Task;

class ProjectRepository
{
    public function getProject(User $user, int $id)
    {
        return $user->projects()->find($id);
    }

    public function getTask(User $user, int $id)
    {
        return Task::find($id);
    }

    public function forUser(User $user)
    {
        return $user->projects()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
