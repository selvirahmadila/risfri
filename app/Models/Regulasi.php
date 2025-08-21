<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    protected $table = 'regulasi';
    
    protected $fillable = [
        'regulation_number',
        'title',
        'description',
        'category',
        'published_date',
        'status',
        'year',
        'institution',
        'regulation_file',
        'tags',
        'content',
        'scope',
        'key_provisions',
        'penalties',
        'notes'
    ];
}
