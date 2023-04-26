<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoTags extends Model
{
    use HasFactory;


    public function todos() {

        return $this->belongsToMany(Todos::class, 'todo_tags_ids', 'tag_id', 'todo_id');

    }
}
