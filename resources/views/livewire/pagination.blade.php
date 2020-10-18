@if ($paginator->hasPages())

<ul class="pagination">
    @if ($paginator->onFirstPage())
    <li class="paginate_button disabled">
        <a><i class="fa fa-angle-right"></i></a>
    </li>
    @else
    <li class="paginate_button">
        <a wire:click="previousPage"><i class="fa fa-angle-right"></i></a>
    </li>
    @endif
    @if (is_array($elements))
    @foreach ($elements[0] as $page => $element)
    @if ($page == $paginator->currentPage())
    <li class="paginate_button active" wire:key="paginator-page-{{ $page }}"><a>{{ $page }}</a></li>
    @else
    <li class="paginate_button"><a wire:click="gotoPage({{ $page }})"
            wire:key="paginator-page-{{ $page }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif

    @if ($paginator->hasMorePages())
    <li class="paginate_button">
        <a wire:click="nextPage"><i class="fa fa-angle-left"></i></a>
    </li>
    @else
    <li class="paginate_button disabled">
        <a><i class="fa fa-angle-left"></i></a>
    </li>
    @endif
</ul>
@endif