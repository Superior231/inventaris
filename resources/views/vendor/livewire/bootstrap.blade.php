<div>
    @if ($paginator->hasPages())
        @php
            isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1;
        @endphp
        
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-link" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @php
                            $start = 1; // Start from page 1
                            $end = $paginator->lastPage(); // Last page
                            $range = 1; // Number of pages before and after current page
                            $window = range(max($start, $paginator->currentPage() - $range), min($end, $paginator->currentPage() + $range));
                            $dots = false;
                        @endphp

                        @for ($i = 1; $i <= $end; $i++)
                            @if ($i == 1 || $i == $end || in_array($i, $window))
                                @if ($dots && !in_array($i - 1, $window))
                                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                                    @php $dots = false; @endphp
                                @endif
                                @if ($i == $paginator->currentPage())
                                    <li class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $i }}" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                                @else
                                    <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $i }}"><button type="button" class="page-link" wire:click="gotoPage({{ $i }}, '{{ $paginator->getPageName() }}')">{{ $i }}</button></li>
                                @endif
                                @php $dots = true; @endphp
                            @endif
                        @endfor
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>