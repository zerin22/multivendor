<style>
    .right__button{
        line-height: 1.5 !important
    }
</style>
@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-start">
    {{-- @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#">01</a>
        </li>
    @else
        <li li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}">01</a>
        </li>
    @endif --}}

    @foreach ($elements as $element)
        {{-- @if (is_string($element))
            <li class="page-item disabled">{{ $element }}</li>
        @endif --}}

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                        <a class="page-link">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="material-icons md-chevron_right"></i></a>
        </li>
    @else
        <li class="page-item disabled">
            <a class="page-link" href="#"><i class="right__button material-icons md-chevron_right"></i></a>
        </li>
    @endif

        {{-- <li class="page-item active"><a class="page-link" href="#">01</a></li>

        <li class="page-item"><a class="page-link" href="#">02</a></li>
        <li class="page-item"><a class="page-link" href="#">03</a></li>
        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">16</a></li>
        <li class="page-item">
            <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
        </li> --}}
    </ul>
</nav>

@endif
