<li class="nav-item dropdown hover {{ request()->query('type') === $type ? 'active' : '' }}">
    <a href="#"
       role="button"
       class="nav-link"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false"
    >
        {{ $name }}
    </a>
    <div class="dropdown-menu">
        <div class="row {{ count($items) >= 12 ? 'wide' : '' }}">
            @foreach($items as $item)
                <div class="{{ count($items) >= 12 ? 'col-sm-2 col-md-4 ' : 'col-12' }}">
                    <a class="dropdown-item {{ request()->query('id') == $item->id && request()->query('type') == $type ? 'active' : '' }}"
                       href="{{ route_with_query('type', ['type' => $type, 'id' => $item->id, 'name' => $item->name]) }}"
                    >
                        {{ $item->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</li>
