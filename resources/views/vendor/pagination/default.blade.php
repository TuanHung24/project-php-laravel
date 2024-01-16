@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-nav">
   
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="pagination-disabled">
            << 
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">
            << 
        </a>
    @endif

    {{-- Pagination Info --}}
    <span class="pagination-info">
        Trang {{ $paginator->currentPage() }} trên {{ $paginator->lastPage() }}
    </span>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">
            >>
        </a>
    @else
        <span class="pagination-disabled">
            >>
        </span>
    @endif
</nav>
@endif