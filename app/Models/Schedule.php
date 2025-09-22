<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'type',
        'meet_link',
        'top_village_1',
        'time_1',
        'top_village_2',
        'time_2',
        'top_village_3',
        'time_3',
    ];
}
