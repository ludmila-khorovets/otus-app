<?php

namespace App\Rules;

use App\Repositories\EquipmentRepository;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EquipmentAvailable implements ValidationRule, DataAwareRule
{

    public function __construct(
        private readonly EquipmentRepository $equipmentRepository,
    )
    {
    }

    protected array $data = [];

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $attributePart = explode('.', $attribute);
        $equipmentId = $attributePart[1];

        $equipment = $this->equipmentRepository->find($equipmentId);

        if (!$equipment) {
            $fail('Выбранное оборудование не найдено.');
        }

        $startAt = $this->data['stat_at'] ?? null;
        $endAt = $this->data['end_at'] ?? null;

        if (!$startAt || !$endAt) {
            return;
        }

        $quantity = (int)$value;

        if ($equipment->total_quantity > $quantity) {
            $fail("Для оборудования '{$equipment->name}' указано недоступное количество. Всего в студии есть: {$equipment->total_quantity} шт.");
        }

        $bookedQuantity = $this->equipmentRepository->getBookedQuantity($equipmentId, $startAt, $endAt);

        if (($bookedQuantity + $quantity) > $equipment->total_quantity) {
            $availableNow = $equipment->total_quantity - $bookedQuantity;

            if ($availableNow <= 0) {
                $fail("Оборудование '{$equipment->name}' полностью занято на выбранное время.");
            } else {
                $fail("Оборудование '{$equipment->name}' частично занято. Доступно для бронирования всего: {$availableNow} шт.");
            }
        }
    }
}
