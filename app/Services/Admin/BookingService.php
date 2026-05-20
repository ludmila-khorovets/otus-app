<?php

namespace App\Services\Admin;

use App\Enums\BookingStatus;
use App\Interfaces\Repository\BookingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

readonly class BookingService
{
    public function __construct
    (
        private BookingRepositoryInterface $bookingRepository,
    )
    {
    }

    public function getPendingBookings(): Collection
    {
        return $this->bookingRepository->getPendingBookings();
    }

    public function statusUpdate($booking, BookingStatus $status): bool
    {
        return $this->bookingRepository->statusUpdate($booking, $status);
    }
}
