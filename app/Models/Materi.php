<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    
    protected $fillable = [
        'title',
        'short_description',
        'content',
        'level',
        'duration',
        'status',
        'category',
        'thumbnail',
        'tags',
        'author',
        'learning_objectives',
        'prerequisites',
        'references'
    ];
}
