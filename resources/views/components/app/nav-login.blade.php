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
                <span> {{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
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
    const isLoggedIn = {{ Auth::check() ? "true" : "false" }};
    $('[data-require-logged-in]').each(function () {
        if (isLoggedIn) {
            $(this).removeAttr('data-require-logged-in');
        } else {
            $(this).on('click', function (event) {
                event.preventDefault();
                $('#modal-require-logged-in').modal('show');
            });
        }
    })
</script>
@endscopedscript
