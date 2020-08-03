@if(Auth::check() && request()->id && request()->id === strval(Auth::id()))
    <div class="pl-2 pl-lg-4 d-none d-md-block">
        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            <a class="nav-link {{ Route::is('user.detail') ? 'active': '' }}"
               href="{{ route('user.detail', ['id' => Auth::id()]) }}">
                Profile
            </a>
            <a class="nav-link {{ Route::is('user.update') ? 'active': '' }}"
               href="{{ route('user.update', ['id' => Auth::id()]) }}">
                Account
            </a>
            <a class="nav-link {{ Route::is('user.favorite') ? 'active': '' }}"
               href="{{ route('user.favorite', ['id' => Auth::id()]) }}">
                Favorites
            </a>
            <a class="nav-link {{ Route::is('user.rated') ? 'active': '' }}"
               href="{{ route('user.rated', ['id' => Auth::id()]) }}">
                Rated
            </a>

            <a class="nav-link" href="#" data-logout-warning>
                Logout
            </a>
        </div>
    </div>
@else
    <h4 class="mb-2">Hot Movies</h4>
    <hr class="border-info mt-2">
    @include('components.movie.side-movie-list', ['movies' => $hots])
@endif

