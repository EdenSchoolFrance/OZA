@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-item prev disabled"><a><i class="fas fa-chevron-left"></i></a></li>
        @else
            <li class="pagination-item prev"><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
        @endif

        @if($paginator->currentPage() > 2)
            <li class="pagination-item"><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif
        @if($paginator->currentPage() > 3)
            <li class="pagination-separation"><a>...</a></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                @if ($i == $paginator->currentPage())
                    <li class="pagination-item active"><a>{{ $i }}</a></li>
                @else
                    <li class="pagination-item"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="pagination-separation"><a>...</a></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 1)
            <li class="pagination-item"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-item next"><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
        @else
            <li class="pagination-item next disabled"><a><i class="fas fa-chevron-right"></i></a></li>
        @endif
    </ul>
@endif