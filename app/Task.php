<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', /* TODO: category_id, user_id, parent_task_id */ 'is_completed'];
}
