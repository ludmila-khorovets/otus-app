<?php

namespace App\Interfaces\Repository;

use App\Enums\BookingStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface BookingRepositoryInterface
{
    public function getBookingsUser(User $user): Collection;

    public function getPendingBookings(): Collection;

    public function statusUpdate($booking , BookingStatus $status): bool;
}
