@extends('user.layout.main')
@section('header')
    <meta name="description" content="منوی کامل کافه شامل غذاهای اصیل کره‌ای، قهوه‌های تخصصی، نوشیدنی‌های گرم و سرد، شیک‌های متنوع، ساندویچ‌ها و دسرهای خوش‌طعم.">
    <meta property="og:title" content="{{ 'منو کافه عالیجناب' }}">
    <meta property="og:description"content="{{ 'منوی کامل کافه عالیجناب شامل انوع نوشیدنی و غذا ها' }}">
    <meta property="og:image" content="{{ asset('image/cafePhoto1.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection
@section('title')
    منو کامل | کافه عالیجناب
@endsection
@section('main')
    <br><br>
    <br> <br class="hidden sm:block">
    <div class="w-full fixed top-0 z-20 sm:h-64 h-52 dark:bg-dark-60 bg-light-60">
    </div>
    <div class="w-full fixed sm:top-64 top-52 bg-gradient-to-t from-transparent z-20 h-2 dark:to-dark-60 to-light-60">
    </div>
    <div class=" w-full fixed top-24 dark:bg-dark-60 bg-light-60  z-30  ">
        <div class="swiper-container  swiper-two relative  select-none	">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper select-none	 ">
                <!-- Slides -->
                @foreach ($categorys as $category)
                    <div data-id="{{ $category->id }}"
                        class="swiper-slide group flex justify-center  size-20 sm:size-36  select-none	  ">
                        <div class="size-full flex justify-center items-center">
                            <div class=" select-none relative size-20 sm:size-36  	 flex items-center justify-center">
                                <div class="size-full flex justify-center absolute top-0 right-0">
                                    <div class="relative">
                                        <div class="size-full amount-slide  pb-5">
                                            <div class="size-full">
                                                <img class=" select-none   size-full    "
                                                    src="{{ '/storage/' . $category->img }}">
                                            </div>
                                            <p
                                                class="text-center text-nowrap w-full dark:text-white text-primary-200 sm:text-lg font-bold text-base">
                                                {{ $category->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="size-full hidden select rotate -z-10 justify-center absolute top-0 right-0">
                                    <img src="/image/sidebar dark.png" class="size-full scale-[1.3] logo  " alt="">
                                </div> --}}
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
            <div class="absolute  flex items-center size-full top-0 right-0">
                <div class="w-full flex px-3  sm:px-5 md:px-7 items-center h-36 lg:px-10 justify-between">

                    <div class="swiper-button-prev !static cursor-pointer swiper-category-button-prev  	">
                        <i class="fa fa-caret-right text-[30px] sm:text-[40px] text-white" aria-hidden="true"></i>
                    </div>
                    <div class="swiper-button-next !static cursor-pointer swiper-category-button-next  	">
                        <i class="fa fa-caret-left text-[30px] sm:text-[40px] text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <br>
    <br>
    <div class=" box-product-scroll-slider sm:mx-10 mx-2  sm:mt-10">
        @foreach ($categorys as $category)
            <div id="{{ $category->id }}"
                class=" category-bable  my-2 text text-center cursor-pointer bg-gradient-to-l  text-white from-transparent  to-transparent rounded-lg  relative p-2 hover:font-bold">
                <span class="mr-2 ">

                    <div class="flex items-center px-0 sm:px-4 text-gray-500">
                        <span
                            class="flex-1 shadow-primary-200 dark:shadow-primary-100 shadow-[0px_0px_6px_3px] h-1 bg-white rounded-full"></span>
                        <h3
                            class="px-3 font-tanha sm:px-6 font-bold text-gray-800 dark:text-white sm:text-2xl text-xl whitespace-nowrap">
                            {{ $category->name }}
                        </h3>
                        <span
                            class="flex-1 shadow-primary-200 dark:shadow-primary-100 shadow-[0px_0px_6px_3px] h-1 bg-white rounded-full"></span>
                    </div>

                </span>
            </div>
            <div class=" sm:pt-8 pt-4 flex flex-wrap justify-around gap-5  p-1 sm:p-4">
                @foreach ($products as $product)
                    @if ($product->category == $category->id)
                        <div class="flex cart-shoping animate__animated animate__zoomIn relative w-full sm:w-[420px] group bg-white dark:bg-gray-800 p-2 rounded-2xl  "
                            data-id="{{ $product->id }}" id="{{ $product->id }}">
                            <div class=" relative">
                                <div class="absolute z-10 right-0 bottom-0  size-full flex justify-center items-end">
                                    <div class="w-full p-2 scale-[1.1]">
                                        <button data-id="{{ $product->id }}"
                                            class="group  border border-white/20 hover:bg-white/30 mt-3 add-to-cart  bg-white/10 backdrop-blur-sm text-xl w-full  h-8 flex justify-center items-center text-white hover:font-bold  group rounded-full ">
                                            <i class="fa hover:font-bold fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                        <div data-id="{{ $product->id }}" id="{{ $product->id }}"
                                            class="group flex  w-full   box-card-control border border-white/20   bg-white/10 backdrop-blur-sm
          text-sm  h-8 px-1 flex justify-between  items-center text-white hover:font-bold  group rounded-full ">
                                            <button
                                                class="
                                                    bg-white/10 backdrop-blur-sm          hover:bg-white/20
          rounded-full   cursor-pointer text-gray-600 group hover:text-white dark:text-gray-100 d flex justify-center items-center text-xl sm:text-2xl size-6 bg-gray-300 plus">

                                                <svg class="group-hover:text-white text-gray-100 size-4"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path fill="currentColor"
                                                        d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1" />
                                                </svg>
                                            </button>
                                            <span class="number select-none font-bold px-1 text-white ">
                                                1
                                            </span>
                                            <button
                                                class="
                                                    bg-white/10 backdrop-blur-sm hover:text-white         hover:bg-white/20
          rounded-full   cursor-pointer text-gray-100 group flex justify-center items-center text-xl sm:text-2xl size-6 bg-gray-300 nega">
                                                <svg class="group-hover:text-white text-gray-100 size-4"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path fill="currentColor"
                                                        d="M5 12a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-28 h-28 overflow-hidden rounded-2xl">
                                    <img class="size-full select-none group-hover:scale-105  object-cover rounded-2xl "
                                        src="{{ '/storage/' . $product->thumbnail }}" alt="">
                                </div>
                            </div>
                            <div style="width: calc(100% - 88px)" class="flex py-2 flex-col relative justify-around pr-5">
                                <p class="text flex justify-between items-center">
                                    <a href="{{ '/product/' . $product->id }}"
                                        class="text-sm sm:text-base select-none font-bold">{{ $product->name }}</a>
                                    <a href="{{ '/product/' . $product->id }}" rel="nofollow"
                                        class="dark:text-gray-100 pl-1 group text-sm dark:hover:text-primary-200 hover:text-primary-200 text-gray-600 flex items-center gap-1  transition">
                                        @if ($product->off)
                                            <span> %{{ $product->off }} تخفیف </span>
                                        @else
                                            <span> مشاهده </span>
                                        @endif
                                        <i class="fa fa-arrow-left group-hover:-translate-x-1" aria-hidden="true"></i>
                                    </a>
                                </p>

                                <p class="text text-sm  ">
                                <div class="flex justify-between  items-center">
                                    <div class="w-full flex flex-wrap  items-center ">
                                        <span
                                            class=" select-none   flex-nowrap text-[10px] opacity-50 scale-75 line-through sm:text-xs text-nowrap text">
                                            {{ \App\Helpers\Helper::price($product->price) }}
                                        </span>
                                        <span class=" select-none  flex-nowrap text-xs sm:text-sm text-nowrap text">
                                            {{ \App\Helpers\Helper::price($product->off ? $product->price - ($product->price / 100) * $product->off : $product->price) }}
                                        </span>

                                    </div>

                                </div>

                            </div>
                            </p>
                        </div>
                        {{-- <div
                            class="animate__animated animate__zoomIn relative group  sm:w-96 w-full mb-4 similar_item cursor-pointer p-1  sm:p-2 flex bg-white border border-gray-200 rounded-lg  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            @if ($product->off)
                                <div class='absolute z-10 sm:top-2 sm:right-2 top-1 right-1'><span
                                        class='text-white  flex items-center flex-row-reverse bg-red-600 px-1 sm:px-2 rounded-3xl'><span
                                            class="text-xs sm:text-sm font-bold flex  items-center mr-0.5">%</span><span
                                            class="flex text-sm sm:text-base items-center mt-0 sm:mt-[1.5px] font-bold">
                                            {{ $product->off }}
                                        </span></span></div>
                            @endif
                            <div
                                class=" w-[90px] sm:w-[110px] h-20 sm:h-24 flex-shrink-0  flex justify-center items-center  relative">
                                <a href="{{ '/product/' . $product->id }}">
                                    <div class="  absolute top-0 right-0 h-full w-full flex   items-center">
                                        <span class=" size-[80px] sm:size-[100px] rounded-lg overflow-hidden ">
                                            <img data-src="{{ isset(json_decode($product->images)[0]) ? json_encode([$product->thumbnail, ...json_decode($product->images)]) : '' }}"
                                                src="{{ '/storage/' . $product->thumbnail }}"
                                                class=" h-full w-full  object-cover " alt="">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class=" flex flex-col w-full justify-between items-center">
                                <div class="flex justify-between items-center w-full">
                                    <span class=" text-base flex items-center sm:text-xl text  w-full font-bold ">
                                        {{ $product->name }}
                                    </span>
                                    <span>
                                        <button data-id="{{ $product->id }}"
                                            class="group add-to-cart bg-primary-200 sm:text-2xl text-lg size-10 sm:size-12 flex justify-center items-center text-white hover:font-bold border-2 border-primary-100 group rounded-xl ">
                                            <i class="fa hover:font-bold fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                        <div class=" justify-center items-center ">
                                        </div>
                                    </span>
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <span class=" text-xs mb-2 mr-2 flex items-center sm:text-base text  w-full font-bold ">
                                        @if ($product->off)
                                            <div class="flex flex-col justify-center items-center">
                                                <div class="line-through h-4 sm:h-5 inline-block opacity-50 scale-75"><span
                                                        class="line-through opacity-50 scale-75">
                                                        {!! App\Helpers\Helper::price($product->price) !!}
                                                    </span></div>
                                                <p> {!! App\Helpers\Helper::price($product->price - ($product->price / 100) * $product->off) !!} </p>
                                            </div>
                                        @else
                                            <span> {!! App\Helpers\Helper::price($product->price) !!} </span>
                                        @endif


                                    </span>

                                    <span>

                                    </span>


                                </div>

                            </div>
                        </div> --}}
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>


    <br>
    <br>
@endsection
@section('script')
    <script>
        window.addEventListener("load", () => {

            const scroll_bar_procuct = document.documentElement;
            const swiper_category = new window.Swiper(".swiper-container.swiper-two", {
                slidesPerView: 1,
                slidesNextView: 1,
                loop: true,
                slidesPerView: 3,
                grabCursor: true,
                pauseOnMouseEnter: true,
                speed: 500,
            });

            let now_poss = 0;
            let move = true;


            function scrolledOnCategory() {
                swiper_category.off('slideChange', slideChangeScrollToProducts);
                let category_bable_first = category_bables[0];
                let data_poss = [];
                let possition_box = scroll_bar_procuct.scrollTop;
                category_bables.forEach(category_bable => {
                    let poss = category_bable.offsetTop - category_bable_first.offsetTop;
                    let id = category_bable.id;
                    data_poss.push({
                        poss: poss,
                        id: id
                    });
                });
                data_poss.reverse()
                let id = 0;
                data_poss.forEach(poss => {
                    if (poss.poss < possition_box) {
                        if (!id)
                            id = poss.id;
                    }
                    if (possition_box == 0) {
                        id = '1'
                    }
                });


                for (let index = 0; index < slides_category.length; index++) {
                    let slide_category = slides_category[index];
                    if (slide_category.dataset.id == id) {
                        swiper_category.slideToLoop(index, 500)
                    }
                }


            }

            window.addEventListener('scroll', scrolledOnCategory)

            swiper_category.on('slideChangeTransitionStart', () => {
                swiper_category.on('slideChange', slideChangeScrollToProducts);
                window.removeEventListener('scroll', scrollChangeSpeed)
            })

            swiper_category.on('tap', () => {
                swiper_category.on('slideChange', slideChangeScrollToProducts);
                window.removeEventListener('scroll', scrollChangeSpeed)
            })

            swiper_category.on('touchStart', () => {
                swiper_category.on('slideChange', slideChangeScrollToProducts);
                window.removeEventListener('scroll', scrollChangeSpeed)
            })

            var setimeout_cancel_scrollor_event = 0;
            var setimeout_slideer_category = 0;

            const addEventScroll = () => {
                swiper_category.off('slideChange', slideChangeScrollToProducts);
                window.addEventListener('scroll', scrolledOnCategory)
                addEventScrollChangeSpeed()
            }

            const addEventScrollChangeSpeed = () => {
                window.addEventListener('scroll', scrollChangeSpeed)
            }

            window.addEventListener('scrollend', addEventScroll)

            function slideChangeScrollToProducts() {
                window.removeEventListener('scroll', scrolledOnCategory)
                setimeout_slideer_category = setTimeout(() => {
                    let id_slide = document.querySelector(".swiper-two .swiper-slide-next").dataset.id;
                    let item_view = document.getElementById(id_slide);
                    if (id_slide !== now_poss) {
                        let first_top_pos = document.querySelector("div.category-bable").offsetTop;
                        let topPos = item_view.offsetTop - first_top_pos;
                        scroll_bar_procuct.scrollTop = topPos;
                        now_poss = id_slide
                    }
                }, 10);
            }

            swiper_category.on('slideChange', slideChangeScrollToProducts);
            slideChangeScrollToProducts()

            const category_bables = document.querySelectorAll('div.category-bable');
            let slides_category_first = document.querySelectorAll('div.swiper-two div.swiper-slide');
            const slides_category = [];
            for (let index = 1; index < slides_category_first.length; index++) {
                const element = slides_category_first[index];
                slides_category.push(element)
            }
            slides_category.push(slides_category_first[0])
            var setimeout_slideer_scroll_box = 0;


            document.querySelector('.swiper-category-button-next').addEventListener('click', () => {
                swiper_category.on('slideChange', slideChangeScrollToProducts);
                swiper_category.slideNext(1000)
            })
            document.querySelector('.swiper-category-button-prev').addEventListener('click', () => {
                swiper_category.on('slideChange', slideChangeScrollToProducts);
                swiper_category.slidePrev(1000)
            })



            let scrollHistory = []; // برای ذخیره تاریخچه { y: scrollY, time: Date.now() }
            const historyLength = 5; // تعداد نقاط اسکرول قبلی که برای تحلیل استفاده می‌کنیم
            const directionChangeThreshold = 50; // حداقل تغییر در Y برای تشخیص تغییر جهت (مثلاً 50 پیکسل)
            const speedChangeThreshold =
                0.5; // نسبت تغییر سرعت (مثلاً اگر سرعت فعلی < 0.5 * سرعت قبلی، یا > 2 * سرعت قبلی)
            let functionExecuted = false;

            const scrollChangeSpeed = () => {
                const now = Date.now();
                const currentScrollY = window.scrollY;

                // اضافه کردن نقطه فعلی به تاریخچه
                scrollHistory.push({
                    y: currentScrollY,
                    time: now
                });
                if (scrollHistory.length > historyLength) {
                    scrollHistory.shift(); // حذف قدیمی‌ترین نقطه اگر تاریخچه طولانی شد
                }

                if (scrollHistory.length < 2) {
                    // اگر نقاط کافی نداریم، نمی‌توانیم تحلیل کنیم
                    lastScrollTime = now; // برای اولین اسکرول
                    return;
                }

                // محاسبه تغییرات بر اساس آخرین نقطه و نقطه ماقبل آخر
                const latest = scrollHistory[scrollHistory.length - 1];
                const previous = scrollHistory[scrollHistory.length - 2];

                const deltaY = latest.y - previous.y;
                const deltaTime = latest.time - previous.time;

                // جلوگیری از تقسیم بر صفر
                if (deltaTime === 0) return;

                const currentSpeed = Math.abs(deltaY) / deltaTime; // سرعت فعلی

                // تحلیل تغییر جهت
                const lastDeltaY = scrollHistory.length > 2 ? scrollHistory[scrollHistory.length - 2].y -
                    scrollHistory[
                        scrollHistory.length - 3].y : 0;

                // تشخیص تغییر جهت (اگر جهت فعلی مخالف جهت قبلی باشد)
                // این بخش نیاز به دقت بیشتری دارد تا نوسانات کوچک را نادیده بگیرد
                const directionChanged = (deltaY > 0 && lastDeltaY < 0 && Math.abs(deltaY) >
                        directionChangeThreshold) ||
                    (deltaY < 0 && lastDeltaY > 0 && Math.abs(deltaY) > directionChangeThreshold);

                // تشخیص تغییر محسوس سرعت (اگر سرعت فعلی خیلی کمتر یا خیلی بیشتر از سرعت قبلی باشد)
                let previousSpeed = 0;
                if (scrollHistory.length >= 3) {
                    const prevPrev = scrollHistory[scrollHistory.length - 3];
                    const prevDeltaTime = previous.time - prevPrev.time;
                    if (prevDeltaTime > 0) {
                        previousSpeed = Math.abs(previous.y - prevPrev.y) / prevDeltaTime;
                    }
                }

                const speedChanged = previousSpeed > 0 && (currentSpeed < previousSpeed *
                    speedChangeThreshold ||
                    currentSpeed > previousSpeed / speedChangeThreshold);


                if ((directionChanged || speedChanged) && !functionExecuted) {
                    runMyCustomFunction(); // تابع مورد نظر را اجرا کن
                    functionExecuted = true; // برای جلوگیری از اجرای مکرر
                } else if (!directionChanged && !speedChanged) {
                    // اگر وضعیت به حالت عادی برگشت، فلگ را ریست کن
                    functionExecuted = false;
                }

            }

            function runMyCustomFunction() {
                addEventScroll()
            }


        })
    </script>
@endsection
