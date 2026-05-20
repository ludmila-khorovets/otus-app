<?php

namespace App\Repositories;

use App\Enums\BookingStatus;
use App\Interfaces\Repository\BookingRepositoryInterface;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository implements BookingRepositoryInterface
{
    public function getBookingsUser(User $user): Collection
    {
        return $user->bookings()->with(['hall', 'equipment'])->get();
    }

    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    public function getPendingBookings(): Collection
    {
        return Booking::with(['hall', 'user'])
            ->where('status', BookingStatus::PENDING)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function statusUpdate($booking, BookingStatus $status): bool
    {
        return $booking->update(['status' => $status->value]);
    }
}
