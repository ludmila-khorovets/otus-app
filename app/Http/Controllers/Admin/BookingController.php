<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateBookingStatusRequest;
use App\Models\Booking;
use App\Services\Admin\BookingService;

class BookingController extends Controller
{
    public function __construct(
        private readonly BookingService $bookingService
    )
    {
    }

    public function index()
    {
        $pendingBookings = $this->bookingService->getPendingBookings();

        return view('admin.bookings.index', compact('pendingBookings'));
    }

    public function statusUpdate(UpdateBookingStatusRequest $request, Booking $booking)
    {
        $status = BookingStatus::from($request->status);

        if (!$this->bookingService->statusUpdate($booking, $status)) {
            return redirect()
                ->route('admin.booking.index')
                ->with('error', 'Не удалось обновить статус бронирования');
        }

        return redirect()
            ->route('admin.booking.index')
            ->with('success', "Статус бронирования успешно изменен");
    }
}
