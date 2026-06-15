<?php

namespace App\Models;

use App\Support\MediaUrl;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page',
        'section_key',
        'label',
        'title',
        'subtitle',
        'description',
        'lead',
        'intro',
        'image',
        'button_text',
    ];

    public function imageUrl(): ?string
    {
        return MediaUrl::resolve($this->image);
    }

    public static function forKey(string $key): ?self
    {
        return static::query()->where('section_key', $key)->first();
    }
}
