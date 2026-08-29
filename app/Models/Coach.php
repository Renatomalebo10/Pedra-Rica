<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'photo', 'role', 'biography', 'year_joined', 'is_active'])]
class Coach extends Model
{
    /** @use HasFactory<Coach> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'year_joined' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getPhotoAttribute(?string $value): ?string
    {
        return $value ? "coaches/{$value}" : null;
    }
}
