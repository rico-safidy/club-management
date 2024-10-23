@if ($paginator->hasPages())
    <nav class="pagination-content">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled pagination-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" class="disabled pagination-btn">&lsaquo;</span>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="pagination-btn">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="pagination-element">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="pagination-element">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-element">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="pagination-btn">&rsaquo;</a>
                </li>
            @else
                <li class="disabled pagination-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" class="disabled pagination-btn">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
