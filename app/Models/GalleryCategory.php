<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['name', 'slug'])]
class GalleryCategory extends Model
{
    /** @use HasFactory<GalleryCategory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (self $category): void {
            if (blank($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function (self $category): void {
            if (blank($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
