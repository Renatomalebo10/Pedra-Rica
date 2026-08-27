<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description'])]
class Competition extends Model
{
    /** @use HasFactory<Competition> */
    use HasFactory;

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
