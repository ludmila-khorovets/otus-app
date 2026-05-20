<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show bg-dark border-success text-success text-center fw-bold" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show bg-dark border-danger text-danger text-center fw-bold" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show bg-dark border-danger text-danger fw-bold" role="alert">
            <i class="bi bi-exclamation-octagon-fill me-2"></i>
            Пожалуйста, исправьте следующие ошибки в форме:
            <ul class="mb-0 mt-2 small fw-normal">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
