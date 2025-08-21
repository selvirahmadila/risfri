<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoFrekuensi extends Model
{
    protected $table = 'info_frekuensi';
    
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
        'image',
        'content',
        'tags',
        'author'
    ];
}
