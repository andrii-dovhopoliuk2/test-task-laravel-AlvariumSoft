@if ($paginator->hasPages())
    <div class="pagination">


        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active" href="{{$url}}">{{$page}}</a>
                    @else
                        <a href="{{$url}}">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        @endif

    </div>
@endif
