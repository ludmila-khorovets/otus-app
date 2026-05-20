<?php

namespace App\Interfaces\Repository;

use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection as BaseCollection;

interface HallRepositoryInterface
{
    public function getAll(): EloquentCollection;

    public function findOrFail(int $id): Hall;

    public function getForHome(int $limit = 3): EloquentCollection;

    public function getPrices(Hall $hall): array;

    public function getPriceByDate(Hall $hall, ?Carbon $date): int;

    public function getComments(Hall $hall): BaseCollection;

    public function isBusy(int $hallId, string $startAt, string $endAt): bool;

    public function update(Hall $hall, array $data): bool;

    public function delete(Hall $hall): bool;

    public function create(array $data): Hall;

    public function hasActiveBookingsHall(Hall $hall): bool;
}
