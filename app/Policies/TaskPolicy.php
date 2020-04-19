<?php

namespace App\Policies;

use App\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    //Determine whether the user can update the model.
    public function update(User $user, Task $task)
    {
        return $this->belongsToUser($user, $task);
    }

    //Determine whether the user can delete the model.
    public function destroy(User $user, Task $task)
    {
        return $this->belongsToUser($user, $task);
    }


    private function belongsToUser(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
