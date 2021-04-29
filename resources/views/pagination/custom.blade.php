@if ($paginator->hasPages())
    <ul class="pagination">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link"><i class="fas fa-play"></i></span>
            </li>
            <li class="page-item">
                <span class="page-link page">الصفحة الحالية</span>
            </li>
        @else
            <li class="page-item disabled">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <span class="page-link"><i class="fas fa-play"></i></span>
                </a>
            </li>
            {{--<li class="page-item">
                <span class="page-link page">الصفحة الحالية</span>
            </li>--}}
            <li class="page-item">
                <span class="page-link page" href="{{ $paginator->previousPageUrl() }}" rel="prev">الصفحة السابقة</span>
            </li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item active">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link last" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="fas fa-play"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link last">
                    <i class="fas fa-play"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
