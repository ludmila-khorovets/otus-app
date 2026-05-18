<?php

namespace App\Http\Requests\Requests;

use App\Interfaces\Repository\EquipmentRepositoryInterface;
use App\Interfaces\Repository\HallRepositoryInterface;
use App\Rules\EquipmentAvailable;
use App\Rules\HallAvailable;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {

        if ($this->filled('date') and $this->filled('time')) {

            $startAt = Carbon::parse($this->input('date') . ' ' . $this->input('time'));
            $duration = (integer)$this->input('duration');

            $endAt = $startAt->copy()->addHours($duration);

            $this->merge([
                'start_at' => $startAt->toDateTimeString(),
                'end_at' => $endAt->toDateTimeString(),
            ]);
        }

        $duration = (int)$this->input('duration');

        $this->merge([
            'total_hours' => $duration,
        ]);

        if ($this->has('equipment')) {
            $this->merge([
                'equipment' => array_filter($this->input('equipment'), function ($quantity) {
                    return $quantity > 0;
                }),
            ]);
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(
        HallRepositoryInterface      $hallRepository,
        EquipmentRepositoryInterface $equipmentRepository,
    ): array
    {
        return [
            'hall_id' => [
                'required',
                'integer',
                'exists:halls,id',
                new HallAvailable($hallRepository)
            ],
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'total_hours' => 'required|integer|between:1,6',
            'phone' => 'required|string|max:50',
            'client_name' => 'required|string',
            'equipment' => 'nullable|array',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
            'equipment.*' => [
                'integer',
                'min:1',
                new EquipmentAvailable($equipmentRepository)
            ],
        ];
    }
}
