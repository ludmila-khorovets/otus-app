<?php

namespace App\Http\Controllers;

use App\Interfaces\Repository\HallRepositoryInterface;
use App\Models\Studio;

class HomeController extends Controller
{
    public function __construct(
        private HallRepositoryInterface $hallRepository
    )
    {
    }

    public function __invoke()
    {
        $halls = $this->hallRepository->getForHome();

        $studio = Studio::firstOrFail();

        $comments = $studio->comments()
            ->with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('home', compact('halls', 'comments'));
    }
}
