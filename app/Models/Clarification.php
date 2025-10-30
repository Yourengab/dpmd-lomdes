<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clarification extends Model
{
    protected $fillable = [
        'title', 'category', 'date'
    ];
}
