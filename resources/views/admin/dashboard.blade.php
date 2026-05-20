@extends('layouts.app')

@section('title', 'Бронирование фотостудии - LUNA')

@section('content')
    <div class="container my-5 text-white">
        <h2 class="mb-4">Панель управления студией</h2>
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="luna-admin-panel p-4 p-md-5">
                    <h4 class="luna-panel-title mb-4">
                        <i class="bi bi-grid-1x2-fill me-2 text-info"></i> Быстрые действия
                    </h4>

                    <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-md-3">
                        <div class="col">
                            <a href="{{ route('admin.halls.index') }}" class="luna-tile">
                                <div class="luna-tile-icon bg-info bg-opacity-10 text-info">
                                    <i class="bi bi-door-open-fill"></i>
                                </div>
                                <div class="luna-tile-info">
                                    <span class="luna-tile-name">Залы студии</span>
                                    <span class="luna-tile-desc">Управление тарифами и фото-павильонами</span>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="{{ route('admin.booking.index') }}" class="luna-tile">
                                <div class="luna-tile-icon bg-success bg-opacity-10 text-success">
                                    <i class="bi bi-calendar-check-fill"></i>
                                </div>
                                <div class="luna-tile-info">
                                    <span class="luna-tile-name">Реестр броней</span>
                                    <span class="luna-tile-desc">Просмотр истории сессий и статусов</span>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="" class="luna-tile">
                                <div class="luna-tile-icon bg-warning bg-opacity-10 text-warning">
                                    <i class="bi bi-camera-reels-fill"></i>
                                </div>
                                <div class="luna-tile-info">
                                    <span class="luna-tile-name">Оборудование</span>
                                    <span class="luna-tile-desc">Каталог софтбоксов, вспышек и линз</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
