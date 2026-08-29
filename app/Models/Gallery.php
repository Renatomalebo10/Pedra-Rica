<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'image_path', 'category_id', 'alt_text'])]
class Gallery extends Model
{
    /** @use HasFactory<Gallery> */
    use HasFactory;

    protected $table = 'gallery';

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    public function getImagePathAttribute(?string $value): ?string
    {
        return $value ? "gallery/{$value}" : null;
    }
}
