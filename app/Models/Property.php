<?php

namespace App\Models;

use App\Support\MediaUrl;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'location',
        'badge',
        'image',
        'tags',
        'pricing_text',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function imageUrl(): ?string
    {
        return MediaUrl::resolve($this->image);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
