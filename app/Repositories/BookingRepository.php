<?php

namespace App\Repositories;

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
}
