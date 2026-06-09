@extends('user.layout.main')
@section('title')
تماس با ما | کافه عالی جناب تهران
@endsection
@section('header')
<meta name="description" content="شماره تماس و شبکه های اجتماعی کافه عالیجناب در تهران">@endsection
@section('main')
    <section class="max-w-7xl mx-auto px-6 pt-0 sm:pt-14 pb-8 sm:pb-10">
        <div class="rounded-3xl overflow-hidden relative h-48  text-white shadow-2xl">
            <img class="size-full object-cover" src="/image/unnamed6.webp" alt="">
            <div class="z-10 flex flex-col justify-center size-full px-6 sm:px-12 bg-black/15  absolute top-0 right-0">
                <h1 class="text-2xl md:text-4xl font-tanha font-extrabold mb-4">
                    با ما در ارتباط باشید
                </h1>

                <h2 class="text-base sm:text-lg mt-2 sm:mt-4 text-white/90 ">
                  برای ارتباط با کافه عالی جناب در تهران، شماره تماس، آدرس و لوکیشن کافه را مشاهده کنید. پاسخگوی سوالات، رزرو و هماهنگی‌های شما هستیم .
                </h2>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="max-w-7xl mx-auto px-6 pb-12">
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Contact Info -->
            <div class="space-y-6">

                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-lg border border-slate-200 dark:border-slate-800">

                    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-5">
                        اطلاعات تماس
                    </h3>

                    <div class="space-y-5 pr-2">

                        <div class="flex flex-col">
                            <p class="text-md font-bold flex items-center font-tanha dark:text-gray-300 text-gray-600">
                                <i class="fa fa-phone rotate-90 -scale-100" aria-hidden="true"></i>
                                <span class="font-tanha mr-2">شماره تماس :</span>
                            </p>
                            <a target="_blank" href="tel:+989021042701" style="direction: ltr" dir="ltr"
                                class="font-semibold mt-2 hover:font-bold hover:-translate-x-4 mr-10  text-slate-800 dark:text-white">
                                09021042701
                            </a>
                            <a target="_blank" href="tel:+982122396648" style="direction: ltr" dir="ltr"
                                class="font-semibold mt-2 hover:font-bold hover:-translate-x-4 mr-10  text-slate-800 dark:text-white">
                                02122396648
                            </a>

                        </div>


                        <div class="flex flex-col">
                            <p class="text-md font-bold flex items-center font-tanha dark:text-gray-300 text-gray-600">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span class="font-tanha mr-2">ایمیل :</span>
                            </p>
                            <a target="_blank" href="mailto:info@alijenabcafe.ir" style="direction: ltr" dir="ltr"
                                class="font-semibold mt-2 hover:font-bold hover:-translate-x-4 mr-10  text-slate-800 dark:text-white">
                                info@alijenabcafe.ir
                            </a>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-md font-bold flex items-center font-tanha dark:text-gray-300 text-gray-600">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span class="font-tanha mr-2">آدرس :</span>
                            </p>
                            <a target="_blank" rel="nofollow" href="{{ env('LOCATION_URL_GOOGLE') }}" style="direction: ltr" dir="ltr"
                                class=" mt-2 hover:font-bold leading-8  text-slate-800 dark:text-white">
                                تجريش ، مجتمع تجاری ارگ ، جنب خروجی پارکینگ ، کافه عالیجناب
                            </a>
                        </div>

                    </div>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-3xl shadow-lg border border-slate-200 dark:border-slate-800">

                    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4">
                        شبکه‌های اجتماعی
                    </h3>

                    <div class="flex flex-col gap-3">
                        <div>
                            <a target="_blank" rel="nofollow" href="https://www.instagram.com/excellency_cafe"
                                class=" rounded-2xl  mt-2 flex justify-between items-center px-6 py-2 text-white bg-gradient-to-tr from-purple-700 via-pink-500 to-yellow-400">
                                <i class="fa text-4xl sm:text-5xl fa-instagram" aria-hidden="true"></i>
                                <span class="text-xl font-bold w-40 text-center  sm:text-2xl">اینستاگرام</span>
                            </a>
                        </div>

                        <div>
                            <a target="_blank" rel="nofollow" href="https://www.instagram.com/excellency_cafe"
                                class=" rounded-2xl text-3xl flex justify-between items-center px-6 py-2 text-white bg-[#24A1DE]">
                                {{-- <i class="fa text-2xl sm:text-5xl fa-instagram" aria-hidden="true"></i> --}}
                                <svg class=" size-9 sm:size-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M0 0h32v32H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="m29.919 6.163l-4.225 19.925c-.319 1.406-1.15 1.756-2.331 1.094l-6.438-4.744l-3.106 2.988c-.344.344-.631.631-1.294.631l.463-6.556L24.919 8.72c.519-.462-.113-.719-.806-.256l-14.75 9.288l-6.35-1.988c-1.381-.431-1.406-1.381.288-2.044l24.837-9.569c1.15-.431 2.156.256 1.781 2.013z" />
                                </svg>

                                <span class="text-xl font-bold w-40 text-center  sm:text-2xl">تلگرام</span>
                            </a>
                        </div>



                    </div>
                </div>

            </div>

            <!-- Form -->
            <div class="lg:col-span-2">

                <div
                    class="bg-white sm:h-full dark:bg-slate-900 p-8 rounded-3xl shadow-lg border border-slate-200 dark:border-slate-800">

                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-8">
                        فرم تماس
                    </h3>

                    <form class="space-y-6">

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>
                                <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                    نام و نام خانوادگی
                                </label>

                                <input type="text" placeholder="خود را معرفی کنید"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-200 outline-none">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                    تلفن
                                </label>

                                <input type="text" placeholder="شماره تلفن خود را وارد کنید"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-200 outline-none">
                            </div>

                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                موضوع
                            </label>

                            <input type="text" placeholder="عنوان پیام"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-200 outline-none">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                                پیام
                            </label>

                            <textarea rows="6" placeholder="محتوا پیام خود را وارد کنید"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-200 outline-none resize-none"></textarea>
                        </div>
                        <div class="flex justify-center sm:justify-start items-center mt-3">
                            <button type="submit"
                                class=" md:w-auto flex items-center px-8 py-4 bg-primary-200 hover:bg-primary-200/90 text-white rounded-xl font-semibold transition">
                                <i class="fa ml-2 text-2xl fa-paper-plane" aria-hidden="true"></i>
                                <span>
                                    ارسال پیام
                                </span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>

    <!-- Map -->
    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="overflow-hidden rounded-3xl shadow-xl border relative border-slate-200 dark:border-slate-800">
            <div class="absolute sm:top-8 right-8 top-6 sm:right-12 z-10" >
                    <a target="_blank" rel="nofollow" href="{{ env('LOCATION_URL_GOOGLE') }}"
                            class="px-6 sm:px-8 flex justify-center items-center py-3 sm:py-4 text-white rounded-2xl
         bg-black/5 backdrop-blur-md
         border border-white/20
         shadow-lg
                  cursor-pointer
         transition-all duration-300
         hover:backdrop-blur-xl
         hover:bg-black/0
         hover:shadow-2xl">
           مسیر یابی
        </a>
            </div>
            <div class="flex justify-center -z-50">
                <div id="map" class=" w-full h-[450px]  border-2 -z-0  rounded-lg"></div>
            </div>

        </div>
    </section>
@endsection
@section('script')
    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css" />
    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>
    <script type="module">
        var our_shop = [35.80757217075951, 51.4272265513117];
        window.reloadMap = () => {
            let map_element = document.querySelector('div#map');
            const map = L.map('map', {
                key: "web.9228d0cd37ab43b4a365de9a3763414e",
                maptype: "dreamy",
            }).setView(our_shop, 17);
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            L.marker(our_shop).addTo(map)
                .bindPopup('<b class="text-center font-bold block text-base w-full" >کافه عالیجناب</b>')
                .openPopup();
        }
        //    marker..bindPopup('مغازه ما').openPopup();

        window.reloadMap()
    </script>
@endsection
