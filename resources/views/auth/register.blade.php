@extends('layouts.app')

@section('title', 'Регистрация - Фотостудия Luna')

@section('content')
    <div class="login-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div class="w-layout-cell single-cell">
                <h2 class="login-main-title login-title-with-border">Регистрация</h2>

                <div class="login-form-block w-form">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <input class="input-style w-input @error('name') error-input @enderror"
                                       maxlength="256"
                                       name="name"
                                       placeholder="Ваше имя *"
                                       type="text"
                                       value="{{ old('name') }}"
                                       required/>
                                @error('name')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <input class="input-style w-input @error('email') error-input @enderror"
                                       maxlength="256"
                                       name="email"
                                       placeholder="Email *"
                                       type="email"
                                       value="{{ old('email') }}"
                                       required/>
                                @error('email')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <input class="input-style w-input @error('password') error-input @enderror"
                                       maxlength="256"
                                       name="password"
                                       placeholder="Пароль *"
                                       type="password"
                                       required/>
                                @error('password')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-stack wf-layout-layout">
                            <div class="w-layout-cell form-cell">
                                <input class="input-style w-input"
                                       maxlength="256"
                                       name="password_confirmation"
                                       placeholder="Подтвердите пароль *"
                                       type="password"
                                       required/>
                            </div>
                        </div>
                        <input type="submit"
                               data-wait="Пожалуйста, подождите..."
                               class="submit-button w-button"
                               value="Зарегистрироваться"/>


                        <div class="login-links">
                            <span class="text-muted">Уже есть аккаунт?</span>
                            <a href="{{ route('auth.login') }}">Войти</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
