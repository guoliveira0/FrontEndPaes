<div id="card{{ $index }}" class="my-3">
    <div class="card text-light">
        <button class="btn btn-sm btn-primary card-body justify-content-between align-items-center fw-bold d-flex" data-bs-toggle="collapse" data-bs-target="#card{{ $index }}-content" aria-expanded="false">
            <span class="text-start">{{ $key }}</span>
            <img id="arrow{{ $index }}-expand" class="transition ms-2" src="{{ Vite::asset('resources/img/icons/arrow-down.svg') }}" width="30" alt="v">
        </button>
    </div>

    <div class="bg-light shadow rounded-bottom">
        <div class="collapse p-3" id="card{{ $index }}-content">
            {{ $value }}
        </div>
    </div>
</div>