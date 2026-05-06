@extends('layouts.app')

@section('content')

    <div class="hero-grid">

        <div class="hero-left">
            <h1 style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d;"
                class="hero-big-text">Luna</h1>
        </div>
        <div style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d;"
             class="hero-mid">
            <p class="hero-paragraph">Интерьерная фотостудия. Стильные локации, профессиональное оборудование для съемки
                и услуги фотографа.</p>
        </div>
    </div>

    <div class="work-section">
        <div class="w-layout-blockcontainer main-container w-container">

            <div class="main-title-box">
                <h2 class="main-title">Наши залы</h2>
                <a href="" class="all-projects">Все залы</a>
            </div>

            <div class="work-wrapper w-dyn-list">
                <div role="list" class="work-list w-dyn-items">
                    @foreach($halls as $hall)
                        <div role="listitem" class="w-dyn-item">
                            <a
                                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                                href="{{ route('halls.show', $hall['id']) }}"
                                class="work-item w-inline-block"
                            >
                                <div class="work-img-wrapp"><img src="{{ Vite::asset('resources/images/' . $hall['image']) }}"
                                                                 alt="" class="work-img"/></div>
                                <h4 class="heading">{{ $hall['name'] }}</h4>
                                <div class="work-category">от {{ $hall['price_weekday'] }} р/час</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
