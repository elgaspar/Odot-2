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

    public function getCategory(User $user, int $id)
    {
        return $user->categories()->find($id);
    }

    public function getTask(User $user, int $id)
    {
        return Task::find($id);
    }

    public function getAllProjectsOfUser(User $user)
    {
        return $user->projects()
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function getAllCategoriesOfUser(User $user)
    {
        return $user->categories()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
