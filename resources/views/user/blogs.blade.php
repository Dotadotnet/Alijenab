@extends('user.layout.main')

@section('main')
    <br>
    <div class="max-w-7xl mx-auto px-4 py-4">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                بلاگ‌ها
            </h1>

            <p class="mt-2 text-gray-600 dark:text-gray-400">
                جدیدترین مقالات و آموزش‌ها
            </p>
        </div>

        {{-- Search --}}
        <form method="GET" action="{{ route('userShowAllBlog') }}" class="mb-8">
            <div class="flex gap-3">

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="جستجو در عنوان یا توضیحات..."
                    class="flex-1 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                <button type="submit"
                    class="px-6 py-3 flex justify-center items-center border-gray-300 border dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-xl  hover:bg-indigo-700 font-medium transition">
                    جستجو
                    <i class="fa fa-search mr-2  rotate-90 " aria-hidden="true"></i>
                </button>

            </div>
        </form>

        {{-- Results count --}}
        <div class="mb-6">
            <span class="text-sm text-gray-500 dark:text-gray-400">
                {{ $blogs->total() }} مقاله پیدا شد
            </span>
        </div>

        {{-- Blogs --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($blogs as $blog)
                <article
                    class="group overflow-hidden rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:border-indigo-500 dark:hover:border-indigo-500 transition duration-300">

                    {{-- Thumbnail --}}
                    <div class="overflow-hidden">
                        <a href="{{ route('shortLinkBlog', $blog->id) }}">
                            <img src="{{ '/storage/' . $blog->thumbnail }}" alt="{{ $blog->title }}"
                                class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                        </a>
                    </div>

                    {{-- Content --}}
                    <div class="p-5">

                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2">
                            {{ $blog->title }}
                        </h2>

                        <div class="text-gray-600 dark:text-gray-400 text-sm leading-7 line-clamp-4">
                            {{ strip_tags($blog->caption) }}
                        </div>

                        <div class="mt-5">

                            <a href="{{ route('shortLinkBlog', $blog->id) }}"
                                class="inline-flex items-center dark:text-white text-gray-900 group  hover:text-primary-200 font-medium">
                                مطالعه مقاله

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 group-hover:-translate-x-1 -scale-100 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>

                            </a>

                        </div>

                    </div>

                </article>

            @empty

              
            @endforelse

        </div><br>


        @if (!count($blogs))
              <div class="w-full justify-center  mt-4 sm:mt-6 mb-6 sm:mb-9 flex items-center">

                    <div class="rounded-2xl flex flex-col items-center justify-center border-dashed  p-12 text-center">

                        <div class="text-5xl mb-4">
                            📚
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            مقاله‌ای پیدا نشد
                        </h3>

                        <p class="mt-2 text-gray-500 dark:text-gray-400">
                            عبارت جستجوی دیگری امتحان کنید.
                        </p>

                    </div>

                </div>
        @endif

        {{-- Pagination --}}
        @if ($blogs->hasPages())
            <div class="mt-10">
                {{ $blogs->links() }}
            </div>
        @endif

    </div>
@endsection
