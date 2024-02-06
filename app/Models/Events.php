<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    
    
    protected $casts = [
        'eventStartDate' => 'datetime',
        'eventStartTime' => 'datetime',
        'eventEndDate' => 'datetime',
        'eventEndTime' => 'datetime',
    ];
}
