<?php

namespace App\Http\Controllers;

use App\Interfaces\Repository\BookingRepositoryInterface;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct(
        private BookingRepositoryInterface $bookingRepository
    )
    {
    }

    public function index()
    {
        $user = User::find(4);

        $bookings = $this->bookingRepository->getBookingsUser($user);

        return view('profile', compact('bookings'));
    }
}
