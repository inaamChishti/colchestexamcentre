<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TuitionCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'level',
        'description',
        'duration',
        'fee',
        'schedule',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function makeSlug(string $title): string
    {
        return Str::slug($title);
    }
}
