@extends('layouts.app')

@section('title', 'Бронирование фотостудии - LUNÁ')

@section('content')
    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-white mb-3">Бронирование студии</h1>
            <p class="text-secondary fs-5">Выберите зал и удобное время для съемки</p>
        </div>


        <div class="mb-5">
            <h3 class="text-white mb-4 text-center">Выберите зал</h3>
            <div class="row justify-content-center g-4">

                <div class="col-md-4">
                    <div class="glass-card p-3 text-center cursor-pointer hall-card" data-hall="lux" data-price="1200" onclick="selectHall('lux', 1200)">
                        <div class="mb-3">
                            <div style="height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" class="rounded-3"></div>
                        </div>
                        <h4 class="text-white mb-2">Студия LUX</h4>
                        <p class="text-secondary small">Просторная студия, 80 м², 5 зон для съемки</p>
                        <p class="text-info h5">1 200 ₽/час</p>
                        <span class="badge bg-secondary">Хит продаж</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card p-3 text-center cursor-pointer hall-card" data-hall="loft" data-price="1500" onclick="selectHall('loft', 1500)">
                        <div class="mb-3">
                            <div style="height: 180px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);" class="rounded-3"></div>
                        </div>
                        <h4 class="text-white mb-2">Студия LOFT</h4>
                        <p class="text-secondary small">Индустриальный стиль, 6 зон, высота 5 м</p>
                        <p class="text-info h5">1 500 ₽/час</p>
                        <span class="badge bg-success">Популярный</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card p-3 text-center cursor-pointer hall-card" data-hall="mini" data-price="800" onclick="selectHall('mini', 800)">
                        <div class="mb-3">
                            <div style="height: 180px; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);" class="rounded-3"></div>
                        </div>
                        <h4 class="text-white mb-2">Студия MINI</h4>
                        <p class="text-secondary small">Компактная студия, 40 м², для портретов</p>
                        <p class="text-info h5">800 ₽/час</p>
                        <span class="badge bg-info">Эконом</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card p-4 p-md-5">
                    <h3 class="text-white mb-4 text-center">Детали бронирования</h3>

                    <form action="#" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label text-secondary">Выбранный зал</label>
                            <div class="bg-dark rounded p-3 border border-secondary">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-white fw-bold" id="selected_hall_name">Не выбран</span>
                                        <input type="hidden" name="hall" id="selected_hall_value" required>
                                    </div>
                                    <span class="text-info" id="selected_hall_price">0 ₽/час</span>
                                </div>
                            </div>
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
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="09:00">09:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="10:00">10:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="11:00">11:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="12:00">12:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="13:00">13:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="14:00">14:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="15:00">15:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="16:00">16:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="17:00">17:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="18:00">18:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="19:00">19:00</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-outline-secondary w-100 time-slot" data-time="20:00">20:00</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="time" id="selected_time" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="duration" class="form-label text-secondary">Длительность (часы)</label>
                            <select class="form-select bg-dark text-white border-secondary" id="duration" name="duration" required>
                                <option value="2">2 часа</option>
                                <option value="3">3 часа</option>
                                <option value="4">4 часа</option>
                                <option value="5">5 часов</option>
                                <option value="6">6 часов</option>
                            </select>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name" class="form-label text-secondary">Ваше имя</label>
                                <input type="text" class="form-control bg-dark text-white border-secondary" id="name" name="name" required>
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
            let selectedHall = null;
            let selectedHallPrice = 0;
            let selectedHallName = '';
            let selectedTime = null;

            function selectHall(hall, price) {
                selectedHall = hall;
                selectedHallPrice = price;

                if (hall === 'lux') selectedHallName = 'Студия LUX';
                else if (hall === 'loft') selectedHallName = 'Студия LOFT';
                else if (hall === 'mini') selectedHallName = 'Студия MINI';

                document.getElementById('selected_hall_name').innerText = selectedHallName;
                document.getElementById('selected_hall_value').value = selectedHall;
                document.getElementById('selected_hall_price').innerText = price + ' ₽/час';

                document.querySelectorAll('.hall-card').forEach(card => {
                    card.style.border = '1px solid rgba(255, 255, 255, 0.08)';
                });
                event.currentTarget.style.border = '2px solid #0dcaf0';

                calculateTotal();
            }

            // Выбор времени
            document.querySelectorAll('.time-slot').forEach(btn => {
                btn.addEventListener('click', function() {

                    document.querySelectorAll('.time-slot').forEach(b => {
                        b.classList.remove('btn-info');
                        b.classList.add('btn-outline-secondary');
                    });

                    // Подсвечиваем выбранный
                    this.classList.remove('btn-outline-secondary');
                    this.classList.add('btn-info');

                    selectedTime = this.getAttribute('data-time');
                    document.getElementById('selected_time').value = selectedTime;
                });
            });

            function calculateTotal() {
                if (selectedHall && selectedHallPrice) {
                    const duration = parseInt(document.getElementById('duration').value);
                    let total = selectedHallPrice * duration;

                    if (duration >= 4) {
                        total = total * 0.95;
                    }

                    document.getElementById('rental_cost').innerText = Math.round(total) + ' ₽';
                    document.getElementById('total_cost').innerText = Math.round(total) + ' ₽';
                }
            }

            document.getElementById('duration').addEventListener('change', calculateTotal);

            const dateInput = document.getElementById('date');
            const today = new Date().toISOString().split('T')[0];
            dateInput.min = today;

            document.querySelector('form').addEventListener('submit', function(e) {
                if (!selectedHall) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите зал');
                    return false;
                }
                if (!selectedTime) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите время');
                    return false;
                }
                if (!dateInput.value) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите дату');
                    return false;
                }
            });
        </script>
    @endpush
@endsection
