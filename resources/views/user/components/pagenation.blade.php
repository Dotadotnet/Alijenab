@php
    $pages = ceil($total / $perPage);
@endphp

@if ($pages > 1)
    <div class="flex justify-center items-center gap-3 mt-8">

        {{-- Prev --}}
        @if ($page > 1)
            <a href="?page={{ $page - 1 }}"
                class="w-10 h-10 flex items-center justify-center rounded-full transition
               bg-gray-200 text-black hover:bg-gray-300
               dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700">
                <i class="fa fa-caret-right" aria-hidden="true"></i>
            </a>
        @endif

        {{-- Pages --}}
        @for ($i = 1; $i <= $pages; $i++)
            <a href="?page={{ $i }}"
                class="w-10 h-10 flex items-center justify-center rounded-full transition
               {{ $page == $i
                   ? 'bg-black text-white dark:bg-white dark:text-black font-bold shadow-md'
                   : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200
                                      dark:bg-zinc-900 dark:text-zinc-300 dark:border-zinc-700 dark:hover:bg-zinc-800' }}">
                {{ $i }}
            </a>
        @endfor

        {{-- Next --}}
        @if ($page < $pages)
            <a href="?page={{ $page + 1 }}"
                class="w-10 h-10 flex items-center justify-center rounded-full transition
               bg-gray-200 text-black hover:bg-gray-300
               dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700">
                <i class="fa fa-caret-left" aria-hidden="true"></i>
            </a>
        @endif

    </div>
@endif
