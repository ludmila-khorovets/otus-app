<?php

namespace App\Http\Controllers;

use App\Interfaces\Repository\HallRepositoryInterface;

class HallController extends Controller
{
    public function __construct(
        private readonly HallRepositoryInterface $hallRepository
    )
    {
    }

    public function index()
    {
        $halls = $this->hallRepository->getAll(true);

        return view('halls', compact('halls'));
    }

    public function show($id)
    {
        $hall = $this->hallRepository->findOrFail($id);
        $prices = $this->hallRepository->getPrices($hall);
        $comments = $this->hallRepository->getComments($hall);

        return view('halls.show', compact('hall', 'prices', 'comments'));
    }
}
