<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentListItem extends Model
{
    protected $fillable = [
        'page',
        'section',
        'type',
        'content',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeForPageSection($query, string $page, string $section)
    {
        return $query->where('page', $page)->where('section', $section);
    }
}
