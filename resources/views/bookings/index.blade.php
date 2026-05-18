@extends('layouts.app')

@section('title', 'Бронирование фотостудии - LUNÁ')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-white mb-3">Бронирование студии</h1>
            <p class="text-secondary fs-5">Выберите зал и удобное время для съемки</p>
        </div>

        <div class="mb-5">
            <h3 class="text-white mb-4 text-center">Выберите зал</h3>

            <div id="hallsCarousel" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">
                    @php
                        $chunks = $halls->chunk(3);
                    @endphp

                    @foreach($chunks as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center g-4">
                                @foreach($chunk as $hall)
                                    <div class="col-md-4">
                                        <div class="glass-card p-3 text-center cursor-pointer hall-card"
                                             data-hall-id="{{ $hall->id }}"
                                             data-price-weekday="{{ $hall->price_weekday }}"
                                             data-price-weekend="{{ $hall->price_weekend }}"
                                             data-hall-name="{{ $hall->name }}">
                                            <div class="mb-3">
                                                @if($hall->image)
                                                    <img src="{{ Vite::asset('resources/images/' . $hall->image) }}"
                                                         class="rounded-3 w-100"
                                                         style="height: 180px; object-fit: cover;">
                                                @else
                                                    <div style="height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" class="rounded-3"></div>
                                                @endif
                                            </div>
                                            <h4 class="text-white mb-2">{{ $hall->name }}</h4>
                                            <p class="text-secondary small">{{ Str::limit($hall->description, 100) }}</p>
                                            <p class="text-info h5">{{ number_format($hall->price_weekend) . ' / ' . number_format($hall->price_weekday) }} ₽</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($chunks->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#hallsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущие</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#hallsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующие</span>
                    </button>

                    <div class="carousel-indicators position-relative mt-4">
                        @foreach($chunks as $index => $chunk)
                            <button type="button"
                                    data-bs-target="#hallsCarousel"
                                    data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card p-4 p-md-5">
                    <h3 class="text-white mb-4 text-center">Детали бронирования</h3>

                    <form action="{{ route('book.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label text-secondary">Выбранный зал</label>
                            <div class="bg-dark rounded p-3 border border-secondary">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-white fw-bold" id="selected_hall_name">Не выбран</span>
                                        <input type="hidden" name="hall_id" id="selected_hall_value" required>
                                    </div>
                                    <span class="text-info" id="selected_hall_price">0 ₽/час</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary">Дополнительное оборудование</label>

                            @foreach($categories as $categoryName => $items)
                                <div class="mb-3">
                                    <span class="text-white small border-start border-info ps-2 mb-2 d-block">{{ $categoryName }}</span>

                                    <div class="row row-cols-1 row-cols-sm-2 g-2">
                                        @foreach($items as $item)
                                            <div class="col">
                                                <div class="bg-dark rounded p-3 border border-secondary h-100 d-flex flex-column justify-content-between">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <div>
                                                            <span class="text-white d-block fw-semibold text-truncate" style="max-width: 180px;">{{ $item->name }}</span>
                                                            <small class="text-muted">В наличии: {{ $item->total_quantity }} шт.</small>
                                                        </div>
                                                        <span class="text-info small fw-bold">{{ number_format($item->price_per_hour, 0, '.', ' ') }} ₽/ч</span>
                                                    </div>

                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-secondary border-secondary text-white-50">Штук</span>
                                                        <input type="number"
                                                               name="equipment[{{ $item->id }}]"
                                                               value="{{ old("equipment.{$item->id}", 0) }}"
                                                               min="0"
                                                               max="{{ $item->total_quantity }}"
                                                               data-price="{{ $item->price_per_hour }}"
                                                               class="form-control bg-dark border-secondary text-white text-center equipment-input">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="date" class="form-label text-secondary">Дата съемки</label>
                                <input type="date" class="form-control bg-dark text-white border-secondary" id="date" name="date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-secondary">Время</label>
                                <div class="time-slots">
                                    <div class="row g-2">
                                        @foreach(['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00'] as $time)
                                            <div class="col-3">
                                                <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="{{ $time }}">{{ $time }}</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <input type="hidden" name="time" id="selected_time" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="duration" class="form-label text-secondary">Длительность (часы)</label>
                            <select class="form-select bg-dark text-white border-secondary" id="duration" name="duration" required>
                                <option value="1">1 час</option>
                                <option value="2">2 часа</option>
                                <option value="3">3 часа</option>
                                <option value="4">4 часа (скидка 5%)</option>
                                <option value="5">5 часов (скидка 5%)</option>
                                <option value="6">6 часов (скидка 5%)</option>
                            </select>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="client_name" class="form-label text-secondary">Ваше имя</label>
                                <input type="text" class="form-control bg-dark text-white border-secondary" id="client_name" name="client_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-secondary">Телефон</label>
                                <input type="tel" class="form-control bg-dark text-white border-secondary" id="phone" name="phone" required>
                            </div>
                        </div>

                        <div class="bg-dark rounded p-4 mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary">Стоимость аренды:</span>
                                <span class="text-white" id="rental_cost">0 ₽</span>
                            </div>
                            <hr class="border-secondary">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-info h5 mb-0">Итого к оплате:</strong>
                                <strong class="text-info h4 mb-0" id="total_cost">0 ₽</strong>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-lg w-100">
                            <i class="bi bi-calendar-check me-2"></i>
                            Забронировать
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let selectedHallId = null;
            let priceWeekday = 0;
            let priceWeekend = 0;
            let selectedHallName = '';
            let selectedTime = null;

            function selectHall(element) {
                selectedHallId = element.dataset.hallId;
                priceWeekday = parseInt(element.dataset.priceWeekday) || 0;
                priceWeekend = parseInt(element.dataset.priceWeekend) || 0;
                selectedHallName = element.dataset.hallName;

                document.getElementById('selected_hall_name').innerText = selectedHallName;
                document.getElementById('selected_hall_value').value = selectedHallId;

                document.querySelectorAll('.hall-card').forEach(card => {
                    card.style.border = '1px solid rgba(255, 255, 255, 0.08)';
                    card.classList.remove('selected');
                });

                element.style.border = '2px solid #0dcaf0';
                element.classList.add('selected');

                calculateTotal();
            }

            document.querySelectorAll('.hall-card').forEach(card => {
                card.addEventListener('click', function() {
                    selectHall(this);
                });
            });

            document.querySelectorAll('.time-slot').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.time-slot').forEach(b => {
                        b.classList.remove('btn-info');
                        b.classList.add('btn-outline-secondary');
                    });

                    this.classList.remove('btn-outline-secondary');
                    this.classList.add('btn-info');

                    selectedTime = this.dataset.time;
                    document.getElementById('selected_time').value = selectedTime;
                });
            });

            function calculateTotal() {
                if (!selectedHallId) return;

                const dateInputValue = document.getElementById('date').value;
                const duration = parseInt(document.getElementById('duration').value) || 1;

                let currentHallPrice = priceWeekday;

                if (dateInputValue) {
                    const selectedDate = new Date(dateInputValue);
                    const dayOfWeek = selectedDate.getDay();

                    if (dayOfWeek === 0 || dayOfWeek === 6) {
                        currentHallPrice = priceWeekend;
                    }
                }

                document.getElementById('selected_hall_price').innerText = currentHallPrice + ' ₽/час';

                let hallTotal = currentHallPrice * duration;
                let discountText = '';

                if (duration >= 4) {
                    hallTotal = hallTotal * 0.95;
                    discountText = ' <span class="text-success">(скидка 5%)</span>';
                }

                document.getElementById('rental_cost').innerHTML = Math.round(hallTotal) + ' ₽' + discountText;

                let equipmentTotal = 0;

                document.querySelectorAll('.equipment-input').forEach(input => {
                    const quantity = parseInt(input.value) || 0;
                    if (quantity > 0) {
                        const pricePerHour = parseInt(input.dataset.price) || 0;
                        equipmentTotal += pricePerHour * quantity * duration;
                    }
                });

                const finalTotal = hallTotal + equipmentTotal;
                document.getElementById('total_cost').innerHTML = Math.round(finalTotal) + ' ₽';
            }

            document.querySelectorAll('.equipment-input').forEach(input => {
                input.addEventListener('input', calculateTotal);
                input.addEventListener('change', calculateTotal);
            });

            document.getElementById('duration').addEventListener('change', calculateTotal);
            document.getElementById('date').addEventListener('change', calculateTotal);

            const dateInput = document.getElementById('date');
            if (dateInput) {
                const today = new Date().toISOString().split('T')[0];
                dateInput.min = today;
            }

            document.querySelector('form').addEventListener('submit', function(e) {
                if (!selectedHallId) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите зал');
                    return false;
                }
                if (!selectedTime) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите время начала');
                    return false;
                }
                if (!dateInput.value) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите дату съемки');
                    return false;
                }
            });
        </script>
    @endpush
@endsection
