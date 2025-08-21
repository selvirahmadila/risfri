<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamus extends Model
{
    protected $table = 'kamus';
    
    protected $fillable = [
        'term',
        'definition',
        'category',
        'status',
        'synonyms',
        'icon',
        'unit',
        'reference',
        'description',
        'examples',
        'tags'
    ];
}
