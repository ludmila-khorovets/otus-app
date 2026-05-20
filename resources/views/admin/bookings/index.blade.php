@extends('layouts.app')

@section('title', 'Админка - Управление залами')

@section('content')
    <div class="container my-5 text-white">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div class="flex-shrink-0">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary" title="На главную">
                    <i class="bi bi-arrow-left me-1"></i> На главную
                </a>
            </div>
            <div class="text-center flex-grow-1">
                <h2 class="text-white mb-1">Управление бронированиями</h2>
            </div>
            <div class="flex-shrink-0" style="width: 110px;">
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="glass-card p-4 border border-secondary"
                     style="background: rgba(0,0,0,0.2); border-radius: 12px;">
                    <h5 class="mb-4 border-bottom border-secondary pb-2 d-flex justify-content-between align-items-center">
                <span>
                    <i class="bi bi-bell-fill text-warning me-2 animate-pulse"></i>
                    Новые заявки на подтверждение
                </span>
                        <span class="badge bg-warning text-dark">{{ $pendingBookings->count() }} новых</span>
                    </h5>

                    @if($pendingBookings->isEmpty())
                        <div class="text-center py-4 text-success opacity-75">
                            <i class="bi bi-shield-check h3 d-block mb-2"></i>
                            Отлично! Все входящие заявки обработаны, необработанных броней нет.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-dark table-hover align-middle mb-0 border-secondary">
                                <thead>
                                <tr class="text-secondary small">
                                    <th>Дата и время съемки</th>
                                    <th>Выбранный павильон</th>
                                    <th>Имя клиента</th>
                                    <th>Телефон</th>
                                    <th>Сумма к оплате</th>
                                    <th class="text-end">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pendingBookings as $booking)
                                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                        <td class="fw-bold text-info">
                                            {{ $booking->start_at->format('d.m.Y') }}
                                            <small class="text-light-emphasis d-block font-weight-normal mt-1">
                                                {{ $booking->start_at->format('H:i') }}
                                                - {{ $booking->end_at->format('H:i') }} ({{ $booking->total_hours }} ч.)
                                            </small>
                                        </td>

                                        <td>
                                            <span class="text-white fw-semibold">{{ $booking->hall->name }}</span>
                                        </td>

                                        <td>{{ $booking->client_name ?? $booking->user?->name }}</td>
                                        <td class="text-secondary small">{{ $booking->user?->phone }}</td>

                                        <td class="fw-bold text-white">
                                            {{ number_format($booking->total_price, 0, '.', ' ') }} ₽
                                        </td>

                                        <td class="text-end">
                                            <div class="d-flex justify-content-end gap-2">

                                                <form action="{{ route('admin.booking.status', $booking->id) }}"
                                                      method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="status"
                                                           value="{{ \App\Enums\BookingStatus::CONFIRMED->value }}">
                                                    <button type="submit"
                                                            class="btn btn-sm btn-success text-dark fw-bold px-3">
                                                        <i class="bi bi-check-lg me-1"></i> Одобрить
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.booking.status', $booking->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Вы уверены, что хотите отклонить эту бронь?')">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="status"
                                                           value="{{ \App\Enums\BookingStatus::CANCELLED->value }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        Отменить
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
        </div>
    </div>
@endsection
