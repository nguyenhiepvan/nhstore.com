@if ($paginator->hasPages())
<!-- Pagination -->
<ul>
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="disabled">
        <span><i class="fa fa-angle-double-left"></i></span>
    </li>
    @else
    <li>
        @php
        $url_ = request()->fullUrl();
        if(preg_match("/page=\d{1,9}&/",$url_)) {
            $url_ = preg_replace("/page=\d{1,9}&/", "page=".($paginator->currentPage()-1)."&", $url_);
        }elseif(preg_match("/page=\d{1,9}/",$url_)){
            $url_ = preg_replace("/page=\d{1,9}/", "page=".($paginator->currentPage()-1), $url_);
        }else{
            $url_ = str_replace("?", "?page=".($paginator->currentPage()-1).'&', $url_);
        }
        @endphp
        <a href="{{ $url_ }}">
            <span><i class="fa fa-angle-double-left"></i></span>
        </a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active"><span>{{ $page }}</span></li>
    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
    @php
    $url_ = request()->fullUrl();
    if(preg_match("/page=\d{1,9}&/",$url_)) {
        $url_ = preg_replace("/page=\d{1,9}&/", "page=".$page."&", $url_);
    }elseif(preg_match("/page=\d{1,9}/",$url_)){
        $url_ = preg_replace("/page=\d{1,9}/", "page=".$page, $url_);
    }else{
     $url_ = str_replace("?", "?page=".$page.'&', $url_);
 }
 @endphp
 <li><a href="{{ $url_ }}">{{ $page }}</a></li>
 @elseif ($page == $paginator->lastPage() - 1)
 <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
 @endif
 @endforeach
 @endif
 @endforeach

 {{-- Next Page Link --}}
 @if ($paginator->hasMorePages())
 @php
 $url_ = request()->fullUrl();
 if(preg_match("/page=\d{1,9}&/",$url_)) {
    $url_ = preg_replace("/page=\d{1,9}&/", "page=".($paginator->currentPage()+1)."&", $url_);
}elseif(preg_match("/page=\d{1,9}/",$url_)){
    $url_ = preg_replace("/page=\d{1,9}/", "page=".($paginator->currentPage()+1), $url_);
}else{
   $url_ = str_replace("?", "?page=".($paginator->currentPage()+1).'&', $url_);
}
@endphp
<li>
    <a href="{{ $url_ }}">
        <span><i class="fa fa-angle-double-right"></i></span>
    </a>
</li>
@else
<li class="disabled">
    <span><i class="fa fa-angle-double-right"></i></span>
</li>
@endif
</ul>
<!-- Pagination -->
@endif