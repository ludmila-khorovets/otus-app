<?php

namespace App\Repositories;

use App\Enums\BookingStatus;
use App\Interfaces\Repository\HallRepositoryInterface;
use App\Models\Booking;
use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection as BaseCollection;

class HallRepository implements HallRepositoryInterface
{
    public function getAll(): EloquentCollection
    {
        return Hall::where('is_active', true)
            ->latest()
            ->get();
    }

    public function findOrFail(int $id): Hall
    {
        return Hall::findOrFail($id);
    }

    public function getForHome(int $limit = 3): EloquentCollection
    {
        return Hall::where('is_active', true)->latest()->take($limit)->get();
    }

    public function getPrices(Hall $hall): array
    {
        return [
            'weekday' => $hall->priceWeekdayLabel,
            'weekend' => $hall->priceWeekendLabel,
        ];
    }

    public function getPriceByDate(Hall $hall, ?Carbon $date = null): int
    {

        $targetDate = $date ?? now();

        return $targetDate ? $hall->price_weekday : $hall->price_weekend;
    }

    public function getComments(Hall $hall): BaseCollection
    {
        return $hall->comments()->with('user')->latest()->get();
    }

    public function isBusy(int $hallId, string $startAt, string $endAt): bool
    {
        return Booking::where('hall_id', $hallId)
            ->where('status', BookingStatus::CONFIRMED)
            ->where('start_at', '<', $endAt)
            ->where('end_at', '>', $startAt)
            ->exists();
    }
}
