<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'user_id', 'tag_id'];

    public function getTag()
    {
        return optional($this->tag)->tag;
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
