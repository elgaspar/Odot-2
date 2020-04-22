<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    //Determine whether the user can update the model.
    public function update(User $user, Category $category)
    {
        return $this->belongsToUser($user, $category);
    }

    //Determine whether the user can delete the model.
    public function destroy(User $user, Category $category)
    {
        return $this->belongsToUser($user, $category);
    }


    private function belongsToUser(User $user, Category $category)
    {
        return $user->id === $category->user_id;
    }
}
