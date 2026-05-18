<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['hall_id', 'user_id', 'start_at', 'end_at', 'total_price', 'total_hours', 'client_note', 'status'])]
class Booking extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
            'status' => BookingStatus::class,
            'total_price' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    protected function dateTimeRange(): Attribute
    {
        return Attribute::make(
            get: fn() => sprintf(
                '%s | %s - %s',
                $this->start_at->format('d.m.Y'),
                $this->start_at->format('H:i'),
                $this->end_at->format('H:i')
            ),
        );
    }

    public function equipment(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'bookings_equipment')
            ->withPivot(['quantity', 'price_per_hour', 'hours'])
            ->withTimestamps();
    }
}
