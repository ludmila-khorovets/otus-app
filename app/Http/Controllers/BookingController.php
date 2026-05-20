<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Http\Requests\StoreBookingsRequest;
use App\Models\Booking;
use App\Models\Equipment;
use App\Repositories\EquipmentRepository;
use App\Repositories\HallRepository;

class BookingController extends Controller
{
    public function __construct(
        private readonly HallRepository      $hallRepository,
        private readonly EquipmentRepository $equipmentRepository,
    )
    {
    }

    public function index()
    {
        $halls = $this->hallRepository->getAll();
        $categories = $this->equipmentRepository->getAll();

        return view('bookings.index', compact('halls', 'categories'));
    }

    public function store(StoreBookingsRequest $request)
    {
        $validated = $request->validated();

        $booking = Booking::create([
            'user_id' => 1,
            'hall_id' => $validated['hall_id'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'total_hours' => $validated['total_hours'],
            'status' => BookingStatus::PENDING,
            'total_price' => 1000,
            'client_note' => "Тест",
        ]);

        if (!empty($validated['equipment'])) {
            $attachData = [];
            foreach ($validated['equipment'] as $equipmentId => $quantity) {
                $equipment = Equipment::find($equipmentId);
                $attachData[$equipmentId] = [
                    'quantity' => $quantity,
                    'hours' => $validated['total_hours'],
                    'price_per_hour' => $equipment->price_per_hour
                ];
            }

            $booking->equipment()->attach($attachData);
        }

        return redirect()
            ->route('home')
            ->with('success', 'Тестовая бронь успешно записана в базу данных!');
    }
}
