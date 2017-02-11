@if ($paginator->hasPages())
    <nav class="pagination">
        <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
        <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next page</a>
        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class=""><a href="" class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
      </ul>
    </nav>
@endif
