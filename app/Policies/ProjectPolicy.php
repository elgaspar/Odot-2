<?php

namespace App\Policies;

use App\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    //Determine whether the user can update the model.
    public function update(User $user, Project $project)
    {
        return $this->belongsToUser($user, $project);
    }

    //Determine whether the user can delete the model.
    public function destroy(User $user, Project $project)
    {
        return $this->belongsToUser($user, $project);
    }


    private function belongsToUser(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
