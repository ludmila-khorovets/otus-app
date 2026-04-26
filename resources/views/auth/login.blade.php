@extends('layouts.app')

@section('title', 'Вход - Фотостудия Luna')

@section('content')
    <div class="login-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div class="w-layout-cell single-cell">
                <h2 class="login-main-title login-title-with-border">Вход</h2>
                <div class="login-form-block w-form">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
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

                        <div class="remember-wrapper">
                            <label class="checkbox-label">
                                <input type="checkbox" name="remember" class="checkbox-input">
                                <span class="checkbox-text">Запомнить меня</span>
                            </label>
                        </div>

                        <input type="submit"
                               data-wait="Пожалуйста, подождите..."
                               class="submit-button w-button"
                               value="Войти"/>

                        <div class="login-links">
                            <a href="{{ route('auth.register') }}">Создать аккаунт</a>
                            <span class="links-separator">|</span>
                            <a href="">Забыли пароль?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
