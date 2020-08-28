<div class="row">
    <div class="col-5 col-md-4 col-xl-3 d-flex pr-1 pr-md-2">
        <div class="card shadow border-0 w-100">
            <a class="stretched-link" href="{{ route('user.detail', ['id' => $user->id]) }}"></a>
            <img src="{{ $user->avatar ? url('storages/' . $user->avatar) : asset('img/avatar-placeholder.jpg') }}"
                 alt="{{ $user->username }}"
                 id="user-avatar"
                 class="card-img">
        </div>
    </div>
    <div class="col-7 col-md-8 col-xl-9 pl-0">
        <div class="card h-100 border-0">
            <div class="card-body p-2 p-md-3">
                <div>
                    <div class="mb-2 text-break">
                        <span class="font-weight-bold mr-2">Username: </span>
                        <span>{{ $user->username ?: 'unknown' }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold mr-2">Name: </span>
                        <span>{{ ($user->detail ? $user->detail->name : '') ?: 'unknown' }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold mr-2">Gender: </span>
                        <span>{{ ($user->detail ? $user->detail->gender : '') ?: 'unknown' }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold mr-2">Since: </span>
                        <span>{{ $user->created_at ? date('Y-m-d', strtotime($user->created_at)): 'unknown' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
