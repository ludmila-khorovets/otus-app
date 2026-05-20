<?php

namespace App\Repositories;

use App\Enums\BookingStatus;
use App\Interfaces\Repository\EquipmentRepositoryInterface;
use App\Models\Equipment;

class EquipmentRepository implements EquipmentRepositoryInterface
{
    public function getAll()
    {
        return Equipment::with('category')
            ->where('total_quantity', '>', 0)
            ->latest()
            ->get()
            ->groupBy('category.name');
    }

    public function find(int $id): ?Equipment
    {
        return Equipment::find($id);
    }

    public function getBookedQuantity(int $id, string $startAt, string $endAt): ?int
    {
        $equipment = $this->find($id);

        if (!$equipment) {
            return 0;
        }

        return $equipment->bookings()
            ->where('bookings.status', BookingStatus::CONFIRMED)
            ->where('bookings.start_at', '<', $endAt)
            ->where('bookings.end_at', '>', $startAt)
            ->sum('bookings_equipment.quantity');
    }
}
