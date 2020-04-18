<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'user_id', /* TODO: category_id, parent_task_id */ 'is_completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
