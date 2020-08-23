@if ($paginator->hasPages())
    <!-- Pagination -->
    <nav>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <v-btn disabled style="min-width: auto" class="px-3 mr-1">
                <v-icon small>fa fa-angle-double-left</v-icon>
            </v-btn>
        @else
            <v-btn style="min-width: auto" class="px-3 mx-1" href="{{ $paginator->previousPageUrl() }}">
                <v-icon small>fa fa-angle-double-left</v-icon>
            </v-btn>
        @endif

        {{-- Pagination Elements --}}
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($i == $paginator->currentPage())
                <v-btn color="indigo darken-2" style="min-width: auto" class="px-3 mr-1">{{ $i }}</v-btn>
            @elseif (($i == $paginator->currentPage() + 1 || $i == $paginator->currentPage() + 2) || $i == $paginator->lastPage())
                <v-btn href="{{ $paginator->url($i) }}" style="min-width: auto" class="px-3 mr-1">{{ $i }}</v-btn>
            @elseif ($i == $paginator->lastPage() - 1)
                <v-btn disabled style="min-width: auto" class="px-3 mr-1">
                    <v-icon small>fa fa-ellipsis-h</v-icon>
                </v-btn>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <v-btn style="min-width: auto" class="px-3 mx-1" href="{{ $paginator->nextPageUrl() }}">
                <v-icon small>fa fa-angle-double-right</v-icon>
            </v-btn>
        @else
            <v-btn disabled style="min-width: auto" class="px-3">
                <v-icon small>fa fa-angle-double-right</v-icon>
            </v-btn>
        @endif
    </nav>
@endif
