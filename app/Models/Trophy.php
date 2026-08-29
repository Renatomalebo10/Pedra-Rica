<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'competition', 'year', 'season_id', 'description', 'photo'])]
class Trophy extends Model
{
    /** @use HasFactory<Trophy> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'year' => 'integer',
        ];
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function getPhotoAttribute(?string $value): ?string
    {
        return $value ? "trophies/{$value}" : null;
    }
}
