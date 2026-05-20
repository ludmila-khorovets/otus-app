<?php

namespace App\Rules;

use App\Interfaces\Repository\HallRepositoryInterface;
use App\Repositories\HallRepository;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class HallAvailable implements ValidationRule, DataAwareRule
{

    public function __construct(
        private readonly HallRepositoryInterface $hallRepository,
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
        $hallId = (int)$value;

        $startAt = $this->data['start_at'] ?? null;
        $endAt = $this->data['end_at'] ?? null;

        if (!$startAt || !$endAt) {
            return;
        }

        if ($this->hallRepository->isBusy($hallId, $startAt, $endAt)) {
            $fail('Выбранный зал уже забронирован на это время. Пожалуйста, выберите другие часы.');
        }
    }
}
