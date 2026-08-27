<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable([
    'title',
    'slug',
    'content',
    'image',
    'author',
    'category',
    'is_published',
    'published_at',
])]
class News extends Model
{
    /** @use HasFactory<News> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $news): void {
            if (blank($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });

        static::updating(function (self $news): void {
            if (blank($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
