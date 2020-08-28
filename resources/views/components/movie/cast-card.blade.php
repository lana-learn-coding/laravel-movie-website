<div class="card shadow border-0 w-100">
    <a class="stretched-link" href="{{ route('cast.detail', ['id' => $cast->id]) }}"></a>
    <div class="ratio-wrapper" style="padding-bottom: 120%">
        <img src="{{ $cast->avatar ? url('storage/' . $cast->avatar) : asset('img/cast-placeholder.jpeg') }}"
             alt="{{ $cast->name }}"
             class="card-img">
    </div>
    <div class="py-2 px-1 text-truncate text-info">
        <span style="font-size: 85%">{{ $cast->name }}</span>
    </div>
</div>
