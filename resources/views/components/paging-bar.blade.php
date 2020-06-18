@if ($paginator->hasPages())
    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a href="#" class="page-link bg-dark"><i class="fa fa-angle-double-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link bg-dark" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active"><a href="#" class="bg-info page-link">{{ $i }}</a></li>
                @elseif (($i == $paginator->currentPage() + 1 || $i == $paginator->currentPage() + 2) || $i == $paginator->lastPage())
                    <li class="page-item"><a class="page-link bg-dark" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @elseif ($i == $paginator->lastPage() - 1)
                    <li class="page-item disabled"><a class="page-link bg-dark"><i class="fa fa-ellipsis-h"></i></a></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-dark" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link bg-dark"><i class="fa fa-angle-double-right"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
