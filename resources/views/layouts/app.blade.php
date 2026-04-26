<!DOCTYPE html>
<html data-wf-page="667187163156a5df09557ed5" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Luna - Фотостудия')</title>

    <link href="{{ Vite::asset('resources/images/favicon.png') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ Vite::asset('resources/images/webclip.png') }}" rel="apple-touch-icon" />

    @vite([
        'resources/css/normalize.css',
        'resources/css/layout.css',
        'resources/css/style.css',
        'resources/js/jquery.min.js',
        'resources/js/plugins.js'
    ])
</head>

<body>

<div class="header">
    <div class="w-layout-blockcontainer main-container w-container">
        <div id="home" data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="header-inner w-nav">
            <nav role="navigation" class="main-menu w-nav-menu">
                <a href="{{ route('home') }}" class="menu-item w-nav-link @if(Route::is('home')) w--current @endif">Главная</a>
                <a href="{{ route('halls') }}" class="menu-item w-nav-link @if(Route::is('halls')) w--current @endif">Залы</a>
                <a href="{{ route('book') }}" class="menu-item w-nav-link @if(Route::is('book')) w--current @endif">Забронировать</a>
                <a href="{{ route('profile') }}" class="menu-item w-nav-link">Личный кабинет</a>
            </nav>
            <button class="btn w-button" onclick="window.location.href='{{ route('auth.login') }}'">Войти</button>
            <div class="menu-button w-nav-button">
                <div class="icon w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
</div>

<div class="w-layout-blockcontainer main-container w-container">
    @yield('content')
</div>

<div class="footer">
    <div class="w-layout-blockcontainer main-container w-container">
        <div class="inner-footer">
            <a href="mailto:luna-studio.com" class="mail-link">luna-studio.com</a>
            <a href="tel:+7 (910) 111-11-11" class="phone-link">+7 (910) 111-11-11</a>
            <div class="socials">
                <a href="https://vk.com" target="_blank" class="social-link w-inline-block">
                    <div class="social-text">VK</div>
                    <img src="{{ Vite::asset('resources/images/arrow-down-right.png') }}" alt="" class="social-arrow" />
                </a>
                <a href="https://web.telegram.org" target="_blank" class="social-link w-inline-block">
                    <div class="social-text">Telegram</div>
                    <img src="{{ Vite::asset('resources/images/arrow-down-right.png') }}" alt="" class="social-arrow" />
                </a>
            </div>
        </div>
    </div>
</div>

@vite([
    'resources/js/jquery.min.js',
    'resources/js/plugins.js'
])

@stack('scripts')
</body>
</html>
