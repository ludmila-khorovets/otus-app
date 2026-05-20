<section class="py-5 bg-black text-white border-secondary">
    <div class="container my-5">
        <div class="mb-5 text-center">
            <h2 class="display-6 fw-bold tracking-wide text-uppercase mb-3">Отзывы гостей</h2>
            <div style="height: 1px; background: linear-gradient(90deg, #ff6b00 0%, rgba(255,107,0,0) 100%); width: 100%;"></div>
        </div>

        <div class="row g-4 mb-5">
            @foreach($comments as $comment)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 bg-dark text-white border-secondary-subtle transition-hover" style="background-color: #0a0a0a !important;">
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div>
                                <div class="mb-3 text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span style="color: {{ $i <= $comment->rating ? '#ff6b00' : '#333' }}; font-size: 1.1rem;">★</span>
                                    @endfor
                                </div>
                                <p class="card-text italic font-weight-light mb-4">
                                    «{{ $comment->text }}»
                                </p>
                            </div>
                            <div class="border-top border-secondary pt-3 d-flex justify-content-between align-items-center">
                                <span class="fw-bold small text-secondary tracking-wider">
                                    {{ $comment->user ? $comment->user->name : $comment->guest_name }}
                                </span>
                                <span class="text-muted small">
                                    {{ $comment->created_at->format('d.m.Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-outline-light px-5 py-3 text-uppercase tracking-widest fw-bold border-2 custom-luna-btn" data-bs-toggle="modal" data-bs-target="#reviewModal">
                Оставить свой отзыв
            </button>
        </div>

    </div>
</section>

<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-black text-white border border-secondary p-3">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold text-uppercase tracking-wider" id="reviewModalLabel">Оставить отзыв</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('book') }}" method="POST">
                    @csrf

                    @guest
                        <div class="mb-3">
                            <label class="form-label small text-muted text-uppercase tracking-widest">Ваше имя</label>
                            <input type="text" name="guest_name" class="form-control bg-dark text-white border-secondary rounded-0 py-2" placeholder="АЛЕКСАНДР" required>
                        </div>
                    @endguest

                    <div class="mb-3">
                        <label class="form-label small text-muted text-uppercase tracking-widest">Ваша оценка</label>
                        <select name="rating" class="form-select bg-dark text-white border-secondary rounded-0 py-2" required>
                            <option value="" disabled selected>ВЫБЕРИТЕ ОЦЕНКУ</option>
                            <option value="5">★ ★ ★ ★ ★ (ОТЛИЧНО)</option>
                            <option value="4">★ ★ ★ ★ (ХОРОШО)</option>
                            <option value="3">★ ★ ★ (НОРМАЛЬНО)</option>
                            <option value="2">★ ★ (ПЛОХО)</option>
                            <option value="1">★ (УЖАСНО)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small text-muted text-uppercase tracking-widest">Текст отзыва</label>
                        <textarea name="text" rows="4" class="form-control bg-dark text-white border-secondary rounded-0" placeholder="ВАШИ ВПЕЧАТЛЕНИЯ ОТ СТУДИИ..." style="resize: none;" required></textarea>
                    </div>

                    <button type="submit" class="btn w-full py-3 fw-bold text-uppercase tracking-widest rounded-0 border-0" style="background-color: #ff6b00; color: white;">
                        Отправить на модерацию
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
