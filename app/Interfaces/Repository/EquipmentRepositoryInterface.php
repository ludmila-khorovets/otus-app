<?php

namespace App\Interfaces\Repository;

use App\Models\Equipment;

interface EquipmentRepositoryInterface
{
    public function getAll();

    public function find(int $id) :?Equipment;

    public function getBookedQuantity(int $id, string $startAt, string $endAt) :?int;
}
