<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoringTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'admin_document_id',
        'category',
        'spreadsheet_url',
        'event_date',
        'village_spreadsheet_url',
        'district_spreadsheet_url',
        'questions_spreadsheet_url',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function adminDocument()
    {
        return $this->belongsTo(AdminDocument::class);
    }
}
