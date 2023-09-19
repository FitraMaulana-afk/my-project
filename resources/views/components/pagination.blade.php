<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    <div class="hidden sm:block">
        <p class="text-sm text-gray-700 leading-5">
            Showing
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-medium">{{ $paginator->total() }}</span>
            results
        </p>
    </div>
    <div class="flex-1 flex justify-between sm:justify-end">
        @if ($paginator->hasPages())
            <nav class="relative z-0 inline-flex shadow-sm">
                {{-- Tautan ke halaman sebelumnya --}}
                @if ($paginator->onFirstPage())
                    <span
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 cursor-not-allowed"
                        aria-disabled="true">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                {{-- Tautan ke halaman selanjutnya --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 cursor-not-allowed"
                        aria-disabled="true">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </nav>
        @endif
    </div>
</div>
