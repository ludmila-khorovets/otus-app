<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHallRequest;
use App\Http\Requests\Admin\UpdateHallRequest;
use App\Interfaces\Repository\HallRepositoryInterface;
use App\Models\Hall;
use App\Services\Admin\HallService;

class HallController extends Controller
{
    public function __construct(
        private readonly HallService             $hallService,
        private readonly HallRepositoryInterface $hallRepository,
    )
    {
    }

    public function index()
    {
        $halls = $this->hallRepository->getAll();

        return view('admin.halls.index', compact('halls'));
    }

    public function create()
    {
        return view('admin.halls.create');
    }

    public function store(StoreHallRequest $request)
    {
        if (!$this->hallService->store($request->validated())) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Не удалось создать зал');
        }

        return redirect()
            ->route('admin.halls.index')
            ->with('success', 'Зал успешно создан');
    }

    public function show(string $id)
    {
        $hall = $this->hallRepository->findOrFail($id);
        $prices = $this->hallRepository->getPrices($hall);

        return view('admin.halls.show', compact('hall', 'prices'));
    }

    public function edit(string $id)
    {
        $hall = $this->hallRepository->findOrFail($id);

        return view('admin.halls.edit', compact('hall'));
    }

    public function update(UpdateHallRequest $request, Hall $hall)
    {
        if (!$this->hallService->update($hall, $request->validated())) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Не удалось обновить зал');
        }

        return redirect()
            ->route('admin.halls.index')
            ->with('success', 'Зал успешно обновлен');
    }

    public function destroy(Hall $hall)
    {
        if (!$this->hallService->delete($hall)) {
            return back()->with('error', 'Нельзя удалить зал, так как в нем есть активные бронирования!');
        }

        return redirect()
            ->route('admin.halls.index')
            ->with('success', 'Зал успешно удален');
    }
}
