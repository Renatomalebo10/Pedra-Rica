<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'is_current'])]
class Season extends Model
{
    /** @use HasFactory<Season> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_current' => 'boolean',
        ];
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function trophies(): HasMany
    {
        return $this->hasMany(Trophy::class);
    }

    public function scopeCurrent(Builder $query): Builder
    {
        return $query->where('is_current', true);
    }
}
