@extends('layouts.app')

@section('content')

    <div class="sigle-work-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div class="single-work-grid">
                <div class="single-work-left">
                    <h4 class="single-main-title-heading">{{ $hall['name'] }}</h4>
                    <div class="single-left-grid">
                        <div  class="single-left-item">
                            <h5 class="single-detail-heading">Описание</h5>
                            <div class="single-details-text">{{ $hall['description'] }}</div>
                        </div>
                        <div class="single-left-item">
                            <h5 class="single-detail-heading">Оборудование</h5>
                            <div class="single-details-text">{{ $hall['equipment'] }}</div>
                        </div>
                        <div class="single-left-item">
                            <h5 class="single-detail-heading">Цена</h5>
                            <div class="single-details-text">{{ $hall['cost'] }} руб/час</div>
                        </div>
                    </div>
                    <a href="" target="_blank" class="button w-button">Забронировать</a>
                </div>
                <div class="single-work-right">
                    <img
                        src="{{ Vite::asset('resources/images/' . $hall['image']) }}"
                        alt=""
                        class="single-main-work-img"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
