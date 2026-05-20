<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable(['name', 'is_active', 'description', 'image', 'price_weekday', 'price_weekend'])]
class Hall extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected function priceWeekdayLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => number_format($this->price_weekday, 0, '.', ' ') . ' ₽',
        );
    }

    protected function priceWeekendLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => number_format($this->price_weekend, 0, '.', ' ') . ' ₽',
        );
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

