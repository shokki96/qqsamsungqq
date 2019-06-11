@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span>Önki</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Önki</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Indiki</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>Indiki</span></li>
        @endif
    </ul>
@endif
