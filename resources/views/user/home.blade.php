
@extends('user.layout.main')
@section('title')
    کافه عالیجناب | جایی برای یه قهوه واقعی
@endsection
@section('header')
    <meta name="description"
        content="در کافه عالیجناب طعم غذای کره‌ای، سوشی، قهوه تخصصی و دسرهای تازه را در فضایی گرم و متفاوت تجربه کنید." />
    <meta property="og:title" content="{{ "کافه عالیجناب" }}">
    <meta property="og:description" content="{{ "در کافه عالیجناب طعم غذای کره‌ای، سوشی، قهوه تخصصی و دسرهای تازه را در فضایی گرم و متفاوت تجربه کنید ." }}">
    <meta property="og:image" content="{{ asset('image/unnamed.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection
@section('main')
    <div>
        @php
            for ($i = 0; $i < count($categorys); $i++) {
                $categorys[$i]['count'] = 0;
                foreach ($products as $product) {
                    if ($product['category'] == $categorys[$i]['id']) {
                        $categorys[$i]['count'] = $categorys[$i]['count'] + 1;
                    }
                }
            }
        @endphp
        <div class="w-full justify-center sm:mt-8 mt-2 px-5 items-center flex">
            <div class="w-full sm:w-3/4 h-[60vh] sm:h-[75vh] rounded-3xl  group overflow-hidden relative">
                <div class="absolute top-0 right-0 size-full flex flex-col justify-between px-4 py-12 md:p-20 lg:p-24 z-20">
                    <div>
                        <div
                            class="flex text-white text-xl sm:text-3xl gap-2 flex-wrap font-bold items-center justify-start">
                            <span class="text-nowrap"> به </span>
                            <h1 class="text-nowrap font-extrabold"> کافه عالیجناب </h1>
                            <span class="text-nowrap"> خوش آمدید </span>
                        </div>

                        <h2 class=" font-tanha mt-4 text-white text-lg sm:text-xl">
                            جایی که طعم و داستان با هم قهوه می‌خورند
                        </h2>
                        <p class="font-tanha mt-3 text-white text-base sm:text-lg">
                            قهوه‌های تخصصی، دسرهای خانگی، غذاهای کره‌ای و برنامه‌های ویدیویی همه در یک کافه .
                        </p>
                    </div>
                    <div class="flex sm:justify-start flex-wrap gap-4 justify-center">
                        <a href="/menu"
                            class="px-6 sm:px-8 flex justify-center items-center py-3 sm:py-4 text-white rounded-2xl
         bg-white/10 backdrop-blur-md
         hover:bg-white/20
         border border-white/20
         cursor-pointer
         shadow-lg 
         transition-all duration-300
         hover:backdrop-blur-xl
         hover:shadow-2xl">
                            مشاهده منو
                        </a>

                        <a href="/contact"
                            class="px-6 sm:px-8 flex justify-center items-center py-3 sm:py-4 text-white rounded-2xl
         bg-white/10 backdrop-blur-md
         border border-white/20
         shadow-lg
                  cursor-pointer
         transition-all duration-300
         hover:backdrop-blur-xl
         hover:bg-white/20
         hover:shadow-2xl">
                            آدرس و تماس
                        </a>
                    </div>
                </div>
                <div class="absolute top-0 right-0 size-full flex flex-col justify-center opacity-15 z-10 bg-black">

                </div>
                <img src="/image/unnamed.webp" class="size-full sm:hidden group-hover:scale-110 object-cover" />
                <img src="/image/unnamed4.webp"
                    class="size-full hidden sm:inline-block group-hover:scale-110 object-cover" />
            </div>
        </div>
        <br>
        @component('user.components.line_text', ['text' => 'دسته بندی ها'])
        @endcomponent
        <div class=" flex flex-wrap gap-8 sm:gap-12 justify-center  w-full ">
            @foreach ($categorys as $category)
                <a rel="nofollow" class="group" href="{{ '#category_' . $category['id'] }}">
                    <div class=" flex flex-col  ">
                        <div class="h-full flex justify-center items-center">
                            <img class="size-20 group-hover:rotate-12 sm:size-32 "
                                src="{{ '/storage/' . $category['img'] }}" alt="">
                        </div>
                        <div>

                            <div class="   h-full justify-center flex flex-col  ">
                                <p
                                    class="text-base font-bold text-center text-primary-200 my-1 font-tanha dark:text-white  sm:text-lg">
                                    {{ $category['name'] }}
                                </p>
                                <p class=" flex justify-center text-gray-600 dark:text-gray-300 sm:text-md">
                                    <span style="text-shadow: 0px 0px 1px 2px #078c91 "
                                        class="font-bold text-md sm:text-lg">{{ $category['count'] }}</span>
                                    <span class="mr-2 mb-0.5 sm:mb-1">محصول</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>


    {{-- <i class="fa fa-bullhorn" aria-hidden="true"></i> --}}
    <br>
    <div class=" div-offer flex mt-5 sm:mt-0 flex-col p-3 md:flex-row bg-primary-200 mx-3 sm:mx-8 rounded-lg  ">
        <div
            class="texts w-full md:w-48  bg-white/30 backdrop-blur-md
         hover:bg-white/40 z-20 relative rounded-lg shadow-[0px_0px_2px_1px_rgba(255,255,255,1)]">
            <div class="absolute flex justify-center w-full -top-10">
                <div class="bg-red-600 mx-1 sm:hidden  text-white text-nowrap rounded-t-3xl z-10 py-2   px-2 text-base">
                    تا <b class="max-offer">{{ $mostOff }}</b> درصد تخفیف
                </div>
            </div>

            <div class="flex flex-row flex-wrap items-center sm:flex-col py-2 sm:py-5 h-full justify-around">
                <div class="flex justify-center">
                    <i class="fa fa-bullhorn text-5xl sm:text-8xl -scale-x-100 text-white" aria-hidden="true"></i>
                </div>
                <div class="flex text-white font-bold text-nowrap   justify-center">
                    تخفیف های ویژه
                </div>
                <div class="hidden sm:flex text-white font-bold   justify-center">
                    <div class="bg-red-600 mx-1 text-nowrap rounded-full py-2 px-2 text-base">
                        تا <b class="max-offer">{{ $mostOff }}</b> درصد تخفیف
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full sm:px-2 md:pt-0 pt-4 justify-center  flex items-center">
            <div class="swiper-offer   swiper -z-50 w-full relative">
                <!-- Parallax background element -->
                <div class="parallax-bg" style="background-image:url(path/to/image.jpg)" data-swiper-parallax="-23%">
                </div>
                <div class="swiper-wrapper">

                    @foreach ($offers as $offer)
                        <div class="swiper-slide">
                            <div class="flex justify-center">
                                <div class=" bg-white  relative w-40 sm:w-48   rounded-lg   dark:bg-gray-800 ">
                                    <div class='absolute z-10 top-4 '><span
                                            class='text-white  flex items-center w-12 justify-center flex-row-reverse bg-red-600 px-1 sm:px-2 rounded-e-3xl '><span
                                                class='text-xs sm:text-sm font-bold flex  items-center mr-0.5'>%</span><span
                                                class='flex text-sm sm:text-base items-center mt-0 sm:mt-[1.5px] font-bold'>
                                                {{ $offer['off'] }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="absolute top-2 left-2">
                                        <div class=" justify-center items-center ">
                                        </div>
                                    </div>
                                    <a rel="nofollow" href="{{ '/product/' . $offer->id }}">
                                        <img class=" size-36  sm:size-40 m-2 sm:m-4 mb-1 sm:mb-2 object-cover rounded-lg"
                                            src="{{ '/storage/' . $offer->thumbnail }}" alt="product image" />
                                    </a>
                                    <div class="px-3 sm:px-5 pb-3">
                                        <a href="{{ '/product/' . $offer->id }}">
                                            <h5 data-swiper-parallax="-100"
                                                class="sm:text-lg text-base font-semibold tracking-tight text-gray-900 dark:text-white">
                                                {{ $offer->name }}
                                            </h5>
                                        </a>
                                        <span
                                            class=" w-full scale-[0.6] sm:scale-75 mt-1 opacity-[0.4] w-full  justify-center flex items-center text-sm font-bold   text-gray-900 dark:text-white">
                                            <b class="inline relative">
                                                <div style="width:calc(100% + 8px)"
                                                    class="absolute  z-10 flex justify-center items-center top-0.5 -right-1  h-full">
                                                    <div class="w-full bg-black rounded-sm   dark:bg-white h-0.5">

                                                    </div>
                                                </div>
                                                {{ \App\Helpers\Helper::price($offer->price) }}
                                            </b>
                                        </span>
                                        <span
                                            class=" mt-1 w-full font-bold w-full  justify-center flex items-center text-md font-bold   text-gray-900 dark:text-white">
                                            {{ \App\Helpers\Helper::price($offer->price - ($offer->price / 100) * $offer->off) }}
                                        </span></span></span>
                                        <div>
                                            <button data-id="{{ $offer->id }}"
                                                class="group  mt-3 add-to-cart bg-primary-200 sm:text-2xl w-full text-lg h-10 sm:h-12 flex justify-center items-center text-white hover:font-bold  group rounded-full ">
                                                <i class="fa hover:font-bold fa-cart-plus" aria-hidden="true"></i>
                                            </button>
                                            <div data-id="{{ $offer->id }}" id="{{ $offer->id }}"
                                                class="group flex  hidden  box-card-control mt-3  dark:bg-gray-700  bg-gray-200 sm:text-2xl w-full text-lg h-10 sm:h-12 flex justify-between px-1 items-center text-white hover:font-bold  group rounded-full ">
                                                <button
                                                    class="rounded-full dark:shadow-gray-200 shadow-gray-800  hover:shadow-[0px_0px_3px_0.5px] cursor-pointer text-gray-600 dark:text-gray-100 dark:bg-gray-600 flex justify-center items-center text-xl sm:text-2xl size-8 sm:size-10 bg-gray-300 plus">

                                                    <svg class="text-gray-600 dark:text-gray-100 size-6 sm:size-8"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1" />
                                                    </svg>
                                                </button>
                                                <span class="number font-bold dark:text-white text-gray-800">
                                                    1
                                                </span>
                                                <button
                                                    class="rounded-full cursor-pointer dark:shadow-gray-200 shadow-gray-800  hover:shadow-[0px_0px_3px_0.5px] dark:text-gray-100 dark:bg-gray-600   text-gray-600 flex justify-center items-center text-2xl size-8 sm:size-10 bg-gray-300 nega">
                                                    <svg class="  text-gray-600 dark:text-gray-100 size-6 sm:size-8"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M5 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="absolute top-6 sm:top-0 right-0 size-full">
                    <div class="flex justify-between w-full items-center">
                        <div class="swiper-button-prev swiper-button-prev-offer  sm:-translate-y-0 -translate-y-10	">
                            <i class="fa fa-caret-right text-[30px] sm:text-[40px] text-white" aria-hidden="true"></i>
                        </div>
                        <div class="swiper-button-next 	swiper-button-next-offer sm:-translate-y-0 -translate-y-10 ">
                            <i class="fa fa-caret-left text-white text-[30px] sm:text-[40px]" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class=" div-sell flex mt-5 sm:mt-0 flex-col p-3 md:flex-row bg-primary-200 mx-3 sm:mx-8 rounded-lg  ">
        <div
            class="texts w-full md:w-48 bg-white/30 backdrop-blur-md
         hover:bg-white/40 z-20 relative rounded-lg shadow-[0px_0px_2px_1px_rgba(255,255,255,1)]">
            <div class="flex flex-row flex-wrap items-center sm:flex-col py-2 sm:py-5 h-full justify-around">
                <div class="flex justify-center">
                    <i class="fa fa-shopping-cart text-5xl sm:text-8xl -scale-x-100 text-white" aria-hidden="true"></i>
                </div>
                <div class="flex text-white font-bold text-nowrap   justify-center">
                    کالا های پر فروش
                </div>

            </div>

        </div>
        <div class="w-full sm:px-2 md:pt-0 pt-4 justify-center  flex items-center">
            <div class="swiper-sell   swiper -z-50 w-full relative">
                <!-- Parallax background element -->
                <div class="parallax-bg" style="background-image:url(path/to/image.jpg)" data-swiper-parallax="-23%">
                </div>
                <div class="swiper-wrapper">
                    @foreach ($selecteds as $selected)
                        <div class="swiper-slide !h-full">
                            <div class="flex  !h-full justify-center">
                                <div class="!h-full bg-white  relative w-40 sm:w-48   rounded-lg   dark:bg-gray-800 ">

                                    @if ($selected['off'])
                                        <div class='absolute z-10 top-4 '><span
                                                class='text-white  flex items-center w-12 justify-center flex-row-reverse bg-red-600 px-1 sm:px-2 rounded-e-3xl '><span
                                                    class='text-xs sm:text-sm font-bold flex  items-center mr-0.5'>%</span><span
                                                    class='flex text-sm sm:text-base items-center mt-0 sm:mt-[1.5px] font-bold'>
                                                    {{ $selected['off'] }}
                                                </span>
                                            </span>
                                        </div>
                                    @endif

                                    <div class="absolute top-2 left-2">
                                        <div class=" justify-center items-center ">
                                        </div>
                                    </div>
                                    <a rel="nofollow" href="{{ '/product/' . $selected->id }}">
                                        <img class=" size-36  sm:size-40 m-2 sm:m-4 mb-1 sm:mb-2 object-cover rounded-lg"
                                            src="{{ '/storage/' . $selected->thumbnail }}" alt="product image" />
                                    </a>
                                    <div class="px-3 sm:px-5 pb-3">
                                        <a href="{{ '/product/' . $selected->id }}">
                                            <h5 data-swiper-parallax="-100"
                                                class="sm:text-lg text-base font-semibold tracking-tight text-gray-900 dark:text-white">
                                                {{ $selected->name }}
                                            </h5>
                                        </a>
                                        @if ($selected->off)
                                            <span
                                                class=" w-full scale-[0.6] sm:scale-75 mt-1 opacity-[0.4] w-full  justify-center flex items-center text-sm font-bold   text-gray-900 dark:text-white">
                                                <b class="inline relative">
                                                    <div style="width:calc(100% + 8px)"
                                                        class="absolute  z-10 flex justify-center items-center top-0.5 -right-1  h-full">
                                                        <div class="w-full bg-black rounded-sm   dark:bg-white h-0.5">

                                                        </div>
                                                    </div>
                                                    {{ \App\Helpers\Helper::price($selected->price) }}
                                                </b>
                                            </span>
                                            <span
                                                class=" mt-1 w-full font-bold w-full  justify-center flex items-center text-md font-bold   text-gray-900 dark:text-white">
                                                {{ \App\Helpers\Helper::price($selected->price - ($selected->price / 100) * $selected->off) }}
                                            </span></span></span>
                                        @else
                                            <div
                                                class="flex justify-center items-center text-md mt-4 font-bold mb-5 sm:text-lg text-gray-900 dark:text-white">
                                                {{ \App\Helpers\Helper::price($selected->price) }}
                                            </div>
                                        @endif

                                        <div>
                                            <button data-id="{{ $selected->id }}"
                                                class="group  mt-3 add-to-cart bg-primary-200 sm:text-2xl w-full text-lg h-10 sm:h-12 flex justify-center items-center text-white hover:font-bold  group rounded-full ">
                                                <i class="fa hover:font-bold fa-cart-plus" aria-hidden="true"></i>
                                            </button>
                                            <div data-id="{{ $selected->id }}" id="{{ $selected->id }}"
                                                class="group flex  hidden  box-card-control mt-3  dark:bg-gray-700  bg-gray-200 sm:text-2xl w-full text-lg h-10 sm:h-12 flex justify-between px-1 items-center text-white hover:font-bold  group rounded-full ">
                                                <button
                                                    class="rounded-full dark:shadow-gray-200 shadow-gray-800  hover:shadow-[0px_0px_3px_0.5px] cursor-pointer text-gray-600 dark:text-gray-100 dark:bg-gray-600 flex justify-center items-center text-xl sm:text-2xl size-8 sm:size-10 bg-gray-300 plus">

                                                    <svg class="text-gray-600 dark:text-gray-100 size-6 sm:size-8"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1" />
                                                    </svg>
                                                </button>
                                                <span class="number font-bold dark:text-white text-gray-800">
                                                    1
                                                </span>
                                                <button
                                                    class="rounded-full cursor-pointer dark:shadow-gray-200 shadow-gray-800  hover:shadow-[0px_0px_3px_0.5px] dark:text-gray-100 dark:bg-gray-600   text-gray-600 flex justify-center items-center text-2xl size-8 sm:size-10 bg-gray-300 nega">
                                                    <svg class="text-gray-600 dark:text-gray-100 size-6 sm:size-8"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M0 0h24v24H0z" fill="none" />
                                                        <path fill="currentColor"
                                                            d="M5 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="absolute top-6 sm:top-0 right-0 size-full">
                    <div class="flex justify-between w-full items-center ">
                        <div class="swiper-button-prev swiper-button-prev-sell  sm:-translate-y-0 -translate-y-10	">
                            <i class="fa fa-caret-right text-[30px] sm:text-[40px] text-white" aria-hidden="true"></i>
                        </div>
                        <div class="swiper-button-next 	swiper-button-next-sell sm:-translate-y-0 -translate-y-10 ">
                            <i class="fa fa-caret-left text-white text-[30px] sm:text-[40px]" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <section class=" py-20">
        <div class="max-w-7xl mx-auto px-6" dir="rtl">

            <!-- Header -->
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-4xl footer-group font-tanha  before:-right-3  font-bold dark:text-white text-gray-800">
                    داستان ما
                </h2>

                <a href="/about"
                    class="dark:text-gray-100  group dark:hover:text-primary-200 hover:text-primary-200 text-gray-600 flex items-center gap-2  transition">
                    مطالعه کامل
                    <i class="fa fa-arrow-left group-hover:-translate-x-1" aria-hidden="true"></i>
                </a>
            </div>

            <!-- Content -->
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- Text -->
                <div>
                    <p class="text-base sm:text-lg dark:text-gray-50  text-gray-700 leading-relaxed ">
                        کافه عالیجناب ترکیبی است از تجربه آرام یک کافه محلی و انرژی
                        غذاهای خیابانی کره‌ای. ما مکان را برای لحظات خوش شما آماده
                        می‌کنیم؛ از صبحانه تا شب .
                        <br>
                        ایجاد محیطی گرم که در آن غذا، موسیقی و گفت‌وگو به هم می‌آمیزند. از آغاز کوچک تا رشد به عنوان یک محل
                        فرهنگی محلی .
                    </p>
                </div>

                <!-- Image Placeholder -->
                <div class="flex justify-center sm:justify-end items-center">
                    <div
                        class="w-full overflow-hidden max-w-md h-64 bg-gray-200 rounded-2xl flex items-center justify-center text-gray-500 font-semibold">
                        <img class="size-full object-cover" src="/image/shop1.jpeg" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>



    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-tanha footer-group  before:-right-3 font-bold dark:text-white text-gray-800">
                مقاله های ما
            </h2>

            <a href="/blogs"
                class="dark:text-gray-100 group dark:hover:text-primary-200 hover:text-primary-200 text-gray-600 flex items-center gap-2  transition">
                تمام وبلاگ ها
                <i class="fa fa-arrow-left group-hover:-translate-x-1" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <div class="sm:p-5 p-3 div-blog">
        <div class="swiper-blog  swiper -z-50 w-full relative">
            <!-- Parallax background element -->
            <div class="swiper-wrapper  ">
                @foreach ($blogs as $blog)
                    <div class="swiper-slide   ">
                        <div class="flex w-full flex-col justify-center items-center">
                            <a href="{{ $blog['link'] }}" class=" group ">
                                <div
                                    class="sm:w-96 w-72 h-40   sm:h-48 overflow-hidden rounded-2xl border-2 border-primary-200 relative">


                                    <div class="absolute flex z-10 flex-col justify-start top-1 right-0 size-full">
                                        <div class="flex flex-col justify-between size-full">
                                            <div class="w-full flex px-3 pt-2 justify-between">
                                                <span
                                                    class="
                                                  bg-white/10 backdrop-blur-md
                                                  border-white hover:bg-white/20 border border-white/20
                                                 text-sm sm:text-base p-2  flex justify-center items-center font-bold rounded-xl text-white">
                                                    {!! '<span class="mt-0 ml-2">' . $blog['data'][0] . '</span>' . ' ' . $blog['data'][1] !!}
                                                </span>

                                                <span
                                                    class="
                                                  bg-white/10 backdrop-blur-md
                                                  border-white hover:bg-white/20 border border-white/20
                                                 text-sm sm:text-base p-2  flex justify-center  items-center font-bold rounded-xl text-white">
                                                    {!! $blog['data'][2] !!}
                                                </span>
                                            </div>
                                            <div class="mb-3 flex justify-center items-center">
                                                <span
                                                    class="
                                                  bg-white/10 backdrop-blur-md
                                                  border-white hover:bg-white/20 border border-white/20
                                                 text-sm sm:text-base  p-2 text-wrap  max-w-60 sm:max-w-80  flex justify-center  items-center font-bold rounded-xl text-white">
                                                    {!! $blog['title'] !!}
                                                </span>
                                            </div>
                                        </div>


                                    </div>




                                    <img class=" group-hover:scale-105 object-cover size-full" src="{{ $blog['img'] }}">
                                </div>

                                <div class="w-full flex justify-center  ">
                                    <div
                                        class="bg-primary-200 text-center text-wrap text-xs sm:text-sm p-2 w-[calc(100%-2rem)] flex justify-center items-center font-bold rounded-b-xl text-white">
                                        {{ $blog['caption'] }}
                                    </div>
                                </div>


                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev swiper-button-prev-blog   	">
                <i class="fa fa-caret-right text-[30px] sm:text-[40px] text-white" aria-hidden="true"></i>
            </div>
            <div class="swiper-button-next 	swiper-button-next-blog ">
                <i class="fa fa-caret-left text-white text-[30px] sm:text-[40px]" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class=" fixed w-full justify-center flex items-center">

    </div>
@endsection
@section('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}

    <script>
        window.addEventListener('load', () => {

            const swiper_offer = new window.Swiper(".swiper-offer", {
                effect: 'free',
                grabCursor: true,
                loop: true,
                pauseOnMouseEnter: true,
                speed: 1000,
                autoplay: {
                    delay: 0,
                },
                breakpoints: {
                    // when window width is >= 320px
                    370: {
                        slidesPerView: 2,
                        spaceBetween: 5
                    },
                    700: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    // when window width is >= 640px
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    }
                },
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: true,
                },

                navigation: {
                    nextEl: '.swiper-button-next-offer',
                    prevEl: '.swiper-button-prev-offer',
                },
            });

            const swiper_sell = new window.Swiper(".swiper-sell", {
                effect: 'free',
                grabCursor: true,
                loop: true,
                pauseOnMouseEnter: true,
                speed: 1000,
                autoplay: {
                    delay: 0,
                },
                breakpoints: {
                    // when window width is >= 320px
                    370: {
                        slidesPerView: 2,
                        spaceBetween: 5
                    },
                    700: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    // when window width is >= 640px
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    }
                },
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: true,
                },

                navigation: {
                    nextEl: '.swiper-button-next-sell',
                    prevEl: '.swiper-button-prev-sell',
                },
            });



            const swiper_blog = new window.Swiper(".swiper-blog", {
                effect: 'free',
                grabCursor: true,
                loop: true,
                pauseOnMouseEnter: true,
                speed: 1000,
                autoplay: {
                    delay: 0,
                },
                breakpoints: {
                    // when window width is >= 320px
                    400: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    // when window width is >= 640px
                    1280: {
                        slidesPerView: 3,
                        spaceBetween: 40
                    }
                },
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: true,
                },

                navigation: {
                    nextEl: '.swiper-button-next-blog',
                    prevEl: '.swiper-button-prev-blog',
                },
            });




        })
    </script>
@endsection
