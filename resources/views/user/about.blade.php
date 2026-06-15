@extends('user.layout.main')

@section('title')
    درباره ما | کافه عالیجناب
@endsection
@section('header')
    <meta name="description"
        content="در کافه عالیجناب، از طعم‌های محبوب کره‌ای تا ساندویچ‌های تازه، قهوه‌های تخصصی و نوشیدنی‌های متنوع، هر انتخاب برای ساختن تجربه‌ای متفاوت کنار هم قرار گرفته است .">
@endsection
@section('main')
    <div class="flex min-h-[50vh]  md:flex-row flex-col-reverse justify-end px-2 md:px-5">
        <div class="w-full md:w-3/5 blog-main">
            <article>

                <h1 class="mr-8 sm:mr-12 mt-4 sm:mt-6 text-2xl footer-group font-sahel before:-right-3 text sm:text-4xl ">
                    درباره ما
                </h1>
                <p class="text-center text-lg sm:text-xl dark:text-gray-200 text-gray-800 font-tanha mt-6">
                    در کافه عالیجناب، از طعم‌های محبوب کره‌ای تا ساندویچ‌های تازه، قهوه‌های تخصصی و نوشیدنی‌های متنوع، هر
                    انتخاب برای ساختن تجربه‌ای متفاوت کنار هم قرار گرفته است .
                </p>
            </article>
            <div class="justify-center items-center pt-6 pb-7 px-10 flex">
                <div class=" w-3/4 ">
                    <img class="rounded-2xl max-w-" src="{{ '/image/' . 'unnamed5.webp' }}" alt="">
                </div>
            </div>
            <br>
            <div class="document-editor ">
                <div class="document-editor__toolbar"></div>
                <div class="document-editor__editable-container">
                    <div class="document-editor__editable  amount text ck-content p-1">

                        <section class="max-w-5xl mx-auto px-6 ">



                            <div class="space-y-14">

                                <div>
                                    <p class="leading-9 text-zinc-700 dark:text-zinc-300">
                                        به کافه ما خوش آمدید؛ جایی که عطر قهوه‌های تخصصی، طعم غذاهای اصیل
                                        کره‌ای و فضایی آرام و دلنشین در کنار هم جمع شده‌اند تا تجربه‌ای
                                        متفاوت برای شما خلق کنند.
                                    </p>

                                    <p
                                        class="mt-6 text-center font-tanha !text-xl font-bold sm:!text-3xl text-zinc-600 dark:text-zinc-400">
                                        هر روز از ساعت ۸ صبح تا ۱۱ شب میزبان شما هستیم
                                    </p>


                                    <p class="mt-6 leading-9 text-zinc-700 dark:text-zinc-300">
                                        کافه ما در سال <strong>۱۴۰۳</strong> با هدف معرفی بخشی از فرهنگ و
                                        طعم‌های جذاب کره جنوبی تأسیس شد. ما باور داریم که غذا فقط برای سیر
                                        شدن نیست؛ بلکه راهی برای سفر کردن، تجربه کردن و آشنایی با فرهنگ‌های
                                        مختلف است. به همین دلیل تلاش کرده‌ایم محیطی ایجاد کنیم که با ورود به
                                        آن، حس قدم زدن در خیابان‌های پرجنب‌وجوش سئول و کافه‌های مدرن کره را
                                        تجربه کنید.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="mb-6 text-3xl font-bold text-zinc-900 dark:text-zinc-100">
                                        تخصص ما؛ غذاهای کره‌ای اصیل
                                    </h2>

                                    <p class="leading-9 text-zinc-700 dark:text-zinc-300">
                                        منوی ما با تمرکز ویژه بر غذاهای کره‌ای طراحی شده است. از طعم‌های تند
                                        و هیجان‌انگیز گرفته تا غذاهای سنتی و محبوب کره، همه با دقت و استفاده
                                        از مواد اولیه باکیفیت تهیه می‌شوند.
                                    </p>

                                    <p class="mt-6 leading-9 text-zinc-700 dark:text-zinc-300">
                                        اگر به فرهنگ غذایی کره جنوبی علاقه دارید یا دوست دارید برای اولین بار
                                        طعم غذاهای کره‌ای را امتحان کنید، کافه ما بهترین نقطه برای شروع این
                                        تجربه است.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="mb-6 text-3xl font-bold text-zinc-900 dark:text-zinc-100">
                                        قهوه تخصصی با استاندارد حرفه‌ای
                                    </h2>

                                    <p class="leading-9 text-zinc-700 dark:text-zinc-300">
                                        علاوه بر غذاهای کره‌ای، ما به قهوه نیز نگاه ویژه‌ای داریم. باریستاهای
                                        ما با استفاده از دانه‌های باکیفیت و روش‌های حرفه‌ای دم‌آوری، انواع
                                        قهوه‌های تخصصی را آماده می‌کنند تا هر فنجان، طعمی ماندگار و
                                        لذت‌بخش داشته باشد.
                                    </p>

                                    <p class="mt-6 leading-9 text-zinc-700 dark:text-zinc-300">
                                        از اسپرسو و آمریکانو گرفته تا لاته، کاپوچینو و نوشیدنی‌های خاص،
                                        همه با دقت و عشق آماده می‌شوند.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="mb-6 text-3xl font-bold text-zinc-900 dark:text-zinc-100">
                                        منویی متنوع برای همه سلیقه‌ها
                                    </h2>

                                    <p class="leading-9 text-zinc-700 dark:text-zinc-300">
                                        در کنار غذاهای کره‌ای و قهوه‌های تخصصی، منوی ما شامل انواع:
                                    </p>

                                    <ul class="mt-6 space-y-3 pr-6 list-disc text-zinc-700 dark:text-zinc-300">
                                        <li>ساندویچ‌های تازه و خوش‌طعم</li>
                                        <li>شیک‌های خنک و جذاب</li>
                                        <li>نوشیدنی‌های گرم و سرد</li>
                                        <li>دسرها و میان‌وعده‌های متنوع</li>
                                    </ul>

                                    <p class="mt-6 leading-9 text-zinc-700 dark:text-zinc-300">
                                        است تا هر مهمان بتواند طعم مورد علاقه خود را پیدا کند.
                                    </p>
                                </div>

                                <div class="flex justify-center !mb-1 mt-3 items-center" >
                                     <a href="/menu" class="text-white text-xl rounded-2xl bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-base  p-4 text-center leading-5">
                                        <i aria-hidden="true" class="fa fa-cutlery"  ></i>
                                        <span>رفتن به منو</span>
                                     </a>
                                </div>

                                <div>
                                    <h2 class="mb-6 text-3xl font-bold text-zinc-900 dark:text-zinc-100">
                                        محیطی آرام برای لحظه‌های خوب
                                    </h2>

                                    <p class="leading-9 text-zinc-700 dark:text-zinc-300">
                                        ما فضایی آرام، تمیز و صمیمی فراهم کرده‌ایم تا بتوانید برای قرارهای
                                        دوستانه، دورهمی‌های خانوادگی، مطالعه، کار یا استراحت روزانه از آن
                                        لذت ببرید.
                                    </p>

                                    <p class="mt-6 leading-9 text-zinc-700 dark:text-zinc-300">
                                        طراحی محیط کافه با الهام از سبک مدرن و مینیمال انجام شده تا حس راحتی
                                        و آرامش را برای مهمانان ایجاد کند. هدف ما این است که هر بار حضور شما
                                        در کافه، به یک خاطره خوش تبدیل شود.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="mb-6 text-3xl font-bold text-zinc-900 dark:text-zinc-100">
                                        چرا ما را انتخاب کنید؟
                                    </h2>

                                    <ul class="space-y-3 pr-6 list-disc text-zinc-700 dark:text-zinc-300">
                                        <li>تخصص در ارائه غذاهای کره‌ای</li>
                                        <li>قهوه‌های تخصصی و حرفه‌ای</li>
                                        <li>مواد اولیه باکیفیت و تازه</li>
                                        <li>محیط آرام و دلنشین</li>
                                        <li>منوی متنوع برای تمام سلیقه‌ها</li>
                                        <li>دسترسی آسان و ساعت کاری مناسب</li>
                                    </ul>
                                </div>

                                <div>
                                    <h2 class="mb-6 text-3xl font-bold text-zinc-900 dark:text-zinc-100">
                                        منتظر دیدار شما هستیم
                                    </h2>

                                    <p class="leading-9 text-zinc-700 dark:text-zinc-300">
                                        اگر به دنبال تجربه‌ای متفاوت از طعم‌های کره‌ای، نوشیدن قهوه‌ای
                                        باکیفیت و گذراندن ساعاتی آرام در فضایی دلنشین هستید، کافه ما آماده
                                        میزبانی از شماست.
                                    </p>

                                    <p class="mt-8 text-xl font-semibold text-zinc-900 dark:text-zinc-100">
                                        با ما، طعم واقعی را تجربه کنید.
                                    </p>
                                </div>

                            </div>

                        </section>

                    </div>
                </div>
            </div>
            <br>

            {{-- {{
                dd(env('DB_DATABASE'))
            }} --}}
            <br>
            <div class=" w-full md:hidden  ">
                <div class="bg-gray-200 dark:bg-gray-700 pb-8 pt-5 sm:pt-2  md:pt-5 lg:pt-5 xl:pt-2 px-5 rounded-lg w-full">

                    <div class=" flex flex-col sm:flex-row  md:flex-col lg:flex-col xl:flex-row   w-full  ">
                        <h3 class=" flex items-center  flex-grow text-nowrap m-1 text-xl sm:text-lg text">اشتراک گذاری در
                            :</h3>
                        <ul class=" w-full mx-1 mt-2 lg:mt-4 mb-4 flex items-center share-box ">

                        </ul>
                    </div>
                    <div class="shareLink">
                        <div class="permalink ">
                            <input class="textLink text" id="text" type="text" name="shortlink"
                                value="{{ env('APP_URL') . '/about' }}" id="copy-link" readonly="">
                            <span class="copyLink text-primary-200 copy" tooltip="Copy to clipboard">
                                <i class="fa-regular fa-copy"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="w-full md:w-2/5 md:absolute nav-blog md:h-full left-0 text-2xl sm:text-3xl text top-32 ">
            <div class="sticky sm:pr-0 pr-7 top-28">
                <div class="text-2xl  sm:text-3xl">
                    عناوین :
                </div>

                <div class="titles py-3 pr-3 sm:pr-5">

                </div>
                <p class="w-full h-4">&nbsp;</p>
                <div class=" w-full md:pl-12 md:inline-block hidden   ">
                    <div
                        class="bg-gray-200 dark:bg-gray-700 pb-8 pt-5 sm:pt-2  md:pt-5 lg:pt-5 xl:pt-2 px-5 rounded-2xl w-full">

                        <div class=" flex flex-col sm:flex-row  md:flex-col lg:flex-col xl:flex-row   w-full  ">
                            <h3 class=" flex items-center  flex-grow text-nowrap m-1 text-xl sm:text-lg text">اشتراک گذاری
                                در
                                :</h3>
                            <ul class=" w-full mx-1 mt-2 lg:mt-4 mb-4 flex items-center share-box ">

                            </ul>
                        </div>
                        <div class="shareLink">
                            <div class="permalink ">
                                <input class="textLink text" id="text" type="text" name="shortlink"
                                    value="{{ env('APP_URL') . '/about' }}" id="copy-link" readonly="">
                                <span class="copyLink text-primary-200 copy" tooltip="Copy to clipboard">
                                    <i class="fa-regular fa-copy"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="w-full md:w-2/5 hidden md:flex"></div>
    </div>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endsection
@section('main')
    <div class=" flex flex-col-reverse md:flex-row-reverse  ">
        <div class=" md:w-1/2 w-full pt-1 sm:pt-2 ">
            <br>
            <div class=" items-center mr-3 sm:mr-0 flex justify-between  ">
                <div class="sm:text-xl text-lg flex items-center font-bold text-black dark:text-white">
                    <a href="#category_{{ $category[1] }}" class="  text-blue-700 hover:text-blue-600 ">
                        {{ $category[0] }} </a>
                    <span class=" pt-1 mx-2 text-2xl  sm:text-3xl  "> / </span>
                    <span class=" sm:text-xl text-lg "> {{ $name }} </span>
                </div>
               
            </div>

            <br>
            <div class=" text pr-7  md:pr-2 text-md sm:text-lg ">
                قیمت : {{ $type }} <b>{!! $price !!}</b>
            </div>
            <br>
            <div class=" text pr-7 md:pr-2 text-md sm:text-lg ">
                توضیحات بیشتر : 
            </div>
            <br>
            <div class="text pr-9 md:pr-4 text-xs sm:text-base ">
                {!! $caption !!}
            </div>
            <br>
            <div>
                @component('user.components.share_box')
                @endcomponent
            </div>
            <br>

            <div class=" flex items-center flex-col justify-center ">

                <div class="w-full p-4 comment">

                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6"
                        class="p-3 mb-3 rounded-lg w-full text-sm text-gray-900 resize-none border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                        placeholder="دیدگاه خود را قرار دهید ..."></textarea>
                    <div class="flex  pr-3 ">
                        <input placeholder="نام (اختیاری)" type="text"
                            class=" text-sm rounded-lg border-gray-400 px-3 text-gray-900 focus:outline-none dark:bg-gray-800 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800 dark:border-gray-700 inline-block mx-4 w-full ">

                        <button type="button"
                            class="  flex justify-center ml-4 p-2 sm:p-3  items-center w-28 sm:w-32  text-sm font-medium text-center 
                            text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm
                            ">ارسال</button>
                    </div>
                </div>
                <button
                    class="bg-transparent comment-show sm:text-md text-sm hover:bg-primary-200 text-primary-200 font-semibold hover:text-white py-2 px-4 border border-primary-200 hover:border-transparent rounded">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <span> مشاهده کامنت ها </span>
                    <b class="show-count-comments">(0)</b>
                </button>
                <section class=" w-full pt-3 lg:p-5  comment-box antialiased ">
                    
                </section>
            </div>
            <br>

        </div>
        
        <div class=" md:w-1/2 w-full ">
            <div class="swiper xl:size-96 lg:size-80 md:size-72 size-64 select-none	">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper select-none	 ">
                    <!-- Slides -->
                    @foreach ($imgs as $img)
                        <div class="swiper-slide size-12 select-none	  ">
                            <div class="size-full select-none	 flex items-center justify-center">
                                <img class=" select-none border-2 border-primary-100	 rounded-[30px] overflow-hidden size-full object-cover "
                                    src="{{ $img }}" alt="{{ $name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev 	">
                    <i class="fa fa-caret-right text-[30px] sm:text-[40px] text-white" aria-hidden="true"></i>
                </div>
                <div class="swiper-button-next 	">
                    <i class="fa fa-caret-left text-white text-[30px] sm:text-[40px]" aria-hidden="true"></i>
                </div>
            </div>
            <br>
            <div class=" pagination-div flex justify-center items-center">
                @for ($i = 0; $i < count($imgs); $i++)
                    <div data-slide="{{ $i }}" onclick="swich_to_slide({{ $i }},this)"
                        class=" border-2 border-primary-100 dark:border-primary-200 cursor-pointer
                 size-16 mx-1 overflow-hidden 
                md:size-20 lg:size-24 rounded-md  ">
                        <img class="size-full object-cover " src="{{ $imgs[$i] }}">
                    </div>
                @endfor
            </div>
            <div  class=" fixed top-20 z-50  left-3 animate__animated animate__pulse animate__delay-3s  animate__infinite inline-block">
                @component('user.components.add_card', ['id' => $id])
                @endcomponent
            </div>
        </div>
    </div>
    
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const pagination_divs = document.querySelectorAll('div.pagination-div div');
    const swiper = new Swiper(".swiper", {
        effect: "cube",
        grabCursor: true,
        loop: true,
        pauseOnMouseEnter: true,
        speed: 2000,
        autoplay: {
            delay: 2000,
            disableOnInteraction: true,
        },
        cubeEffect: {
            shadow: false,
            slideShadows: false,
            shadowOffset: 20,
            shadowScale: 0.94,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },


    });

    function swich_to_slide(id, move = true) {
        let div_selected = null;
        for (let i = 0; i < pagination_divs.length; i++) {
            let pagination_div = pagination_divs[i];
            if (pagination_div.dataset.slide == id) {
                pagination_div.classList.add('active-slide');
            } else {
                pagination_div.classList.remove('active-slide')
            }
        }
        if (move) {
            console.log(id)
            swiper.slideToLoop(id, 2000)
        }
    }
    swiper.on('slideChange', function() {
        swich_to_slide(swiper.realIndex, false);
    });
    const page_id = @json($id);
    window.page_id = page_id;
</script> --}}
@endsection
