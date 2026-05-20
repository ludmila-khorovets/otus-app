@extends('layouts.app')

@section('title', 'Админка - Управление залами')

@section('content')
    <div class="container my-5 text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card p-4 p-md-5 border border-secondary">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary" title="Вернуться назад">
                        <i class="bi bi-arrow-left me-1"></i> Назад
                    </a>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-white mb-0">Создание зала</h3>
                    </div>

                    {{ html()->form('POST', route('admin.halls.store'))->acceptsFiles()->open() }}

                    <div class="mb-4">
                        <div class="form-check form-switch bg-dark border border-secondary rounded p-3 d-flex align-items-center justify-content-between">
                            <div>
                                {{ html()->label('Статус активности зала', 'is_active')->class('form-check-label text-white fw-bold d-block') }}
                                <small class="text-secondary">Если зал неактивен, клиенты не смогут увидеть и забронировать его на сайте</small>
                            </div>

                            <div>
                                {{ html()->checkbox('is_active')
                                    ->class('form-check-input')
                                    ->id('is_active')
                                    ->style('transform: scale(1.5); cursor: pointer;') }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        {{ html()->label('Название', 'name')->class('form-label text-secondary') }}
                        {{ html()->text('name')
                            ->class('form-control bg-dark text-white border-secondary' . ($errors->has('name') ? ' is-invalid' : ''))
                            ->placeholder('Например: Зал Аполлон')
                            ->required() }}
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {{ html()->label('Описание', 'description')->class('form-label text-secondary') }}
                        {{ html()->textarea('description')
                            ->class('form-control bg-dark text-white border-secondary' . ($errors->has('description') ? ' is-invalid' : ''))
                            ->required() }}
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {{ html()->label('Главное изображение зала', 'image')->class('form-label text-secondary') }}
                        {{ html()->file('image')
                            ->class('form-control bg-dark text-white border-secondary' . ($errors->has('image') ? ' is-invalid' : ''))
                            ->accept('image/*')
                            ->required() }}
                        <small class="text-muted d-block mt-1">Рекомендуемый формат: JPG, PNG или WebP. Максимальный размер: 2МБ.</small>
                        @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            {{ html()->label('Цена аренды в будни (₽/час)', 'price_weekday')->class('form-label text-secondary') }}
                            {{ html()->number('price_weekday')
                                ->class('form-control bg-dark text-white border-secondary' . ($errors->has('price_weekday') ? ' is-invalid' : ''))
                                ->required() }}
                            @error('price_weekday')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            {{ html()->label('Цена аренды в выходные (₽/час)', 'price_weekend')->class('form-label text-secondary') }}
                            {{ html()->number('price_weekend')
                                ->class('form-control bg-dark text-white border-secondary' . ($errors->has('price_weekend') ? ' is-invalid' : ''))
                                ->required() }}
                            @error('price_weekend')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        {{ html()->button('<i class="bi bi-save me-2"></i> Сохранить изменения')
                            ->type('submit')
                            ->class('btn btn-info btn-lg w-100 text-white fw-bold') }}
                    </div>

                    {{ html()->form()->close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
