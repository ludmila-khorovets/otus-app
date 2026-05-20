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
                            <h5 class="single-detail-heading">Цена</h5>
                            <div class="single-details-text">
                                <p><strong>{{ $prices['weekday'] }}</strong> час будни </p>
                                <p><strong>{{ $prices['weekend'] }}</strong> час выходные</p>
                            </div>
                        </div>
                    </div>
                    <a href="" target="_blank" class="button w-button">Забронировать</a>
                </div>
                <div class="single-work-right">
                    <img
                        src="{{ asset('storage/' . $hall->image) }}"
                        alt=""
                        class="single-main-work-img"
                    />
                </div>
            </div>
        </div>
    </div>
    @include('components.comments-section', ['comments' => $comments])
@endsection
