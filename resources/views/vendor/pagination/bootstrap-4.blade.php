<div class="blog-pagination">
    @if ($paginator->hasPages())
        <nav>
            <ul class="justify-content-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class=" disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <a class="" aria-hidden="true">&lsaquo;</a>
                    </li>
                @else
                    <li class="">
                        <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class=" disabled" aria-disabled="true"><a class="">{{ $element }}</a>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class=" active" aria-current="page"><a class="">{{ $page }}</a>
                                </li>
                            @else
                                <li class=""><a class="" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="">
                        <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class=" disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <a class="" aria-hidden="true">&rsaquo;</a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
