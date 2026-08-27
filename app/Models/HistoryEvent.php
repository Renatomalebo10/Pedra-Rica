<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'event_date', 'year', 'sort_order'])]
class HistoryEvent extends Model
{
    /** @use HasFactory<HistoryEvent> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('sort_order', 'asc');
        });
    }
}
