<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDocument extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'file_url',
        'category',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'category' => 'string',
        ];
    }

    /**
     * Get formatted category name.
     */
    public function getCategoryNameAttribute(): string
    {
        return match($this->category) {
            'village' => 'Village (Desa)',
            'district' => 'District (Kelurahan)',
            default => ucfirst($this->category)
        };
    }
}
