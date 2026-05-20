<?php

namespace App\Interfaces\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface BookingRepositoryInterface
{
    public function getBookingsUser(User $user): Collection;
}
