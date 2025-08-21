<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabelSpektrum extends Model
{
    protected $table = 'tabel_spektrum';
    
    protected $fillable = [
        'frequency_band',
        'band_category',
        'service',
        'status',
        'bandwidth',
        'regulation',
        'allocation_year',
        'condition',
        'users',
        'description',
        'notes'
    ];
}
