<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'opponent',
    'opponent_logo',
    'match_date',
    'match_time',
    'location',
    'competition_id',
    'season_id',
    'our_score',
    'opponent_score',
    'status',
    'notes',
])]
class Game extends Model
{
    /** @use HasFactory<Game> */
    use HasFactory;

    protected $table = 'matches';

    protected function casts(): array
    {
        return [
            'match_date' => 'date',
            'match_time' => 'string',
            'our_score' => 'integer',
            'opponent_score' => 'integer',
        ];
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function getOpponentLogoAttribute(?string $value): ?string
    {
        return $value ? "logos/{$value}" : null;
    }
}
