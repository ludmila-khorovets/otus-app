@extends('layouts.app')

@section('title', 'Личный кабинет - Фотостудия Luna')

@section('content')

    <div class="profile-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div class="profile-header">
                <h2 class="profile-main-title login-title-with-border">Личный кабинет</h2>
            </div>

            <div class="profile-grid">
                <div class="profile-left">
                    <div class="profile-avatar">
                        <img src="{{ Vite::asset('resources/images/default-avatar.jpeg') }}" alt="Аватар">
                        <button class="change-avatar-btn">Изменить фото</button>
                    </div>

                    <div class="profile-user-info">
                        <h3 id="user-name">Екатерина Иванова</h3>
                        <p class="user-email">ekaterina@example.com</p>
                        <p class="user-phone">+7 (910) 123-45-67</p>
                        <p class="user-registered">Зарегистрирован: 15.01.2024</p>
                    </div>
                </div>

                <div class="profile-right">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')

                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <label class="form-label">Имя</label>
                                <input class="input-style"
                                       maxlength="256"
                                       name="name"
                                       placeholder="Ваше имя"
                                       type="text"
                                       value="Екатерина Иванова"/>
                            </div>
                        </div>

                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <label class="form-label">Email</label>
                                <input class="input-style"
                                       maxlength="256"
                                       name="email"
                                       placeholder="Email"
                                       type="email"
                                       value="ekaterina@example.com"/>
                            </div>
                        </div>

                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <label class="form-label">Телефон</label>
                                <input class="input-style"
                                       maxlength="256"
                                       name="phone"
                                       placeholder="Телефон"
                                       type="tel"
                                       value="+7 (910) 123-45-67"/>
                            </div>
                        </div>
                        <button type="submit" class="submit-button">
                            Сохранить изменения
                        </button>
                    </form>
                </div>
            </div>

            <div class="bookings-section">
                <h3 class="bookings-title">Мои бронирования</h3>

                <div class="bookings-list">
                    <div class="booking-item">
                        <div class="booking-info">
                            <span class="booking-hall">Premium Studio</span>
                            <span class="booking-date">25.12.2024 | 14:00 - 17:00</span>
                            <span class="booking-status status-confirmed">Подтверждено</span>
                        </div>
                        <button class="booking-cancel-btn">Отменить</button>
                    </div>

                    <div class="booking-item">
                        <div class="booking-info">
                            <span class="booking-hall">Loft Space</span>
                            <span class="booking-date">28.12.2024 | 10:00 - 13:00</span>
                            <span class="booking-status status-pending">Ожидает</span>
                        </div>
                        <button class="booking-cancel-btn">Отменить</button>
                    </div>

                    <div class="booking-item">
                        <div class="booking-info">
                            <span class="booking-hall">Minimal White</span>
                            <span class="booking-date">10.01.2025 | 15:00 - 18:00</span>
                            <span class="booking-status status-completed">Завершено</span>
                        </div>
                        <button class="booking-cancel-btn disabled" disabled>Отменить</button>
                    </div>
                </div>
            </div>

            <div class="logout-section">
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="logout-btn">Выйти из аккаунта</button>
                </form>
            </div>
        </div>
    </div>
@endsection
