<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Определение отношения hasMany с моделью Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
