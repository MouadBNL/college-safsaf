@if ($paginator->hasPages())
<div class="flex justify-center">
    <div class="flex">
        {{-- PREV --}}
        @if (! $paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="mx-2">
            <span class="w-8 h-8 transition rounded-md bg-primary-500 hover:bg-primary-600 flex items-center justify-center">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="#DCDCDC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                                
            </span>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="mx-2">
                            <span class="w-8 h-8 transition rounded-md bg-primary-500 hover:bg-primary-600 text-white flex items-center justify-center">
                                {{ $page }}                         
                            </span>
                        </a>
                    @else
                        <a href="{{ $url }}" class="mx-2">
                            <span class="w-8 h-8 transition rounded-md bg-gray-50 hover:bg-gray-200 flex items-center justify-center">
                                {{ $page }}    
                            </span>
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach


        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="mx-2">
            <span class="w-8 h-8 transition rounded-md bg-primary-500 hover:bg-primary-600 flex items-center justify-center">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 13L7 7L1 1" stroke="#DCDCDC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
        </a>
        @endif
    </div>
</div>
@endif