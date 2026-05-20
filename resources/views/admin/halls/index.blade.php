@extends('layouts.app')

@section('title', 'Админка - Управление залами')

@section('content')
    <div class="container my-5 text-white">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary" title="На главную">
                <i class="bi bi-arrow-left me-1"></i> На главную
            </a>
            <div>
                <h2 class="text-white mb-1">Управление залами</h2>
            </div>
            <div>
                <a href="{{ route('admin.halls.create') }}" class="btn btn-info text-white">
                    <i class="bi bi-plus-lg me-1"></i> Добавить новый зал
                </a>
            </div>
        </div>

        <div class="glass-card p-4 border border-secondary">
            @if($halls->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-door-closed h3 d-block mb-2"></i>
                    В базе данных фотостудии пока нет ни одного зала.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0 border-secondary">
                        <thead>
                        <tr class="text-secondary small">
                            <th>ID</th>
                            <th>Название зала</th>
                            <th>Статус</th>
                            <th>Цена в будни</th>
                            <th>Цена в выходные</th>
                            <th>Дата добавления</th>
                            <th class="text-end">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($halls as $hall)
                            <tr>

                                <td class="text-secondary">#{{ $hall->id }}</td>

                                <td>
                                    <a href="{{ route('admin.halls.show', $hall->id) }}"
                                       class="text-white fw-bold d-block text-decoration-none hover:text-info">
                                        {{ $hall->name }}
                                    </a>
                                </td>

                                <td>
                                    <span
                                        class="text-success fw-bold d-block">{{ $hall->is_active ? 'Активен' : '' }}</span>
                                </td>

                                <td class="text-info fw-semibold">
                                    {{ number_format($hall->price_weekday, 0, '.', ' ') }} ₽/час
                                </td>
                                <td class="text-warning fw-semibold">
                                    {{ number_format($hall->price_weekend, 0, '.', ' ') }} ₽/час
                                </td>

                                <td class="text-secondary small">
                                    {{ $hall->created_at->format('d.m.Y H:i') }}
                                </td>

                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.halls.edit', $hall->id) }}"
                                           class="btn btn-sm btn-outline-info" title="Редактировать параметры и цены">
                                            <i class="bi bi-pencil-square"></i> Изменить
                                        </a>

                                        <form action="{{ route('admin.halls.destroy', $hall->id) }}" method="POST"
                                              onsubmit="return confirm('Вы уверены, что хотите безвозвратно удалить зал «{{ $hall->name }}»? Это сотрет все связанные с ним бронирования!')"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    title="Удалить зал из базы">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
