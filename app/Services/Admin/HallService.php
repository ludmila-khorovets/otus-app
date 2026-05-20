<?php

namespace App\Services\Admin;

use App\Interfaces\Repository\HallRepositoryInterface;
use App\Models\Hall;
use Illuminate\Support\Facades\Storage;

readonly class HallService
{
    public function __construct(
        private HallRepositoryInterface $hallRepository,
    )
    {
    }

    public function update(Hall $hall, array $data): bool
    {
        if (isset($data['image']) && $data['image']->isValid()) {

            if ($hall->image) {
                Storage::disk('public')->delete($hall->image);
            }

            $path = $data['image']->store('halls', 'public');

            $data['image'] = $path;
        } else {
            unset($data['image']);
        }

        return $this->hallRepository->update($hall, $data);
    }

    public function delete(Hall $hall): bool
    {
        if ($this->hallRepository->hasActiveBookingsHall($hall)) {
            return false;
        }

        if ($hall->image) {
            Storage::disk('public')->delete($hall->image);
        }

        $this->hallRepository->delete($hall);

        return true;
    }

    public function store(array $data): Hall
    {
        $path = $data['image']->store('halls', 'public');

        $data['image'] = $path;

        return $this->hallRepository->create($data);
    }
}
