<ul class="navbar-nav">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"
               href="#"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false"
            >
                <span> {{ Auth::user()->username }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" style="z-index: 1030">
                <a class="dropdown-item" href="{{ route('user.detail', ['id' => Auth::id()]) }}">
                    {{ __('Profile') }}
                </a>
                <a class="dropdown-item" href="{{ route('user.update', ['id' => Auth::id()]) }}">
                    {{ __('Account') }}
                </a>
                <a class="dropdown-item" href="{{ route('user.favorite', ['id' => Auth::id()]) }}">
                    {{ __('Favorites') }}
                </a>
                <a class="dropdown-item" href="{{ route('user.rated', ['id' => Auth::id()]) }}">
                    {{ __('Rated') }}
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" data-logout-warning>
                    {{ __('Logout') }}
                </a>
            </div>
        </li>
    @endguest
</ul>

@if(!Auth::check())
    @scoped('components.app.nav-login')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-require-logged-in">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login required</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please login to use this feature</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="{{ route("login") }}" type="button" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
    @endscoped

    @scopedscript('components.app.nav-login')
    <script>
        $('[data-require-logged-in]').each(function () {
            $(this).on('click', function (event) {
                event.preventDefault();
                $('#modal-require-logged-in').modal('show');
            });
        })
    </script>
    @endscopedscript
@else
    @scoped('components.app.nav-login')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-logout-warning">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You are about to logout</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <a href="{{ route("logout") }}" type="button" class="btn btn-primary"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @endscoped

    @scopedscript('components.app.nav-login')
    <script>
        $('[data-logout-warning]').each(function () {
            $(this).on('click', function (event) {
                event.preventDefault();
                $('#modal-logout-warning').modal('show');
            });
        })
    </script>
    @endscopedscript
@endif
