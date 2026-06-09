<footer class=" w-full flex flex-col sm:flex-row flex-wrap justify-center sm:justify-around p-3 sm:p-5">
    <div class="text footer-group shadow-primary-200 w-full md:w-auto   ">
        <div class="flex  flex-col m-3">
            <span class="mr-4 text-md sm:text-lg"> 
                <i class="fa fa-phone" aria-hidden="true"></i>
                تماس با ما :</span>
            <a rel="nofollow" href="tel:02122396648" class="md:mr-24 mr-10 text-md mt-3 hover:pr-5 hover:font-bold ">02122396648</a>
            <a rel="nofollow" href="tel:09127813121" class="md:mr-24 mr-10 text-md mt-3 hover:pr-5 hover:font-bold ">09127813121</a>
            <span class="mr-4 mt-3 text-md sm:text-lg"> <i class="fa fa-map-marker" aria-hidden="true"></i>
                آدرس ما :</span>
            <a   target="black" href="{{ env('LOCATION_URL_GOOGLE') }}"
                class="md:mr-16 sm:mr-6 mr-3 text-sm mt-3 hover:-translate-x-4 hover:font-bold ">
              تجريش ، مجتمع تجاری ارگ ، جنب خروجی پارکینگ
            </a>
        </div>
    </div>


    
    <div class="text footer-group shadow-primary-200 w-full md:w-auto mt-4 sm:mt-0  ">
        <div class="flex flex-col m-3">
            <span class="mr-4 text-md sm:text-lg"> <i class="fa fa-envelope" aria-hidden="true"></i>
                انتقادات و پیشنهادات شما :</span>
            <a href="mailto:info@alijenabcafe.ir"
                class="  md:mr-10 sm:mr-10 mr-3 text-md mt-3 hover:pr-5 hover:font-bold ">info@alijenabcafe.ir</a>
            <a href="/about" class="mr-4 text-md sm:text-lg hover:pr-5 hover:font-bold mt-3"> <i
                    class="fa translate-y-1 fa-info-circle" aria-hidden="true"></i>
                درباره ما</a>
            <a href="/call" class="mr-4 mt-3 text-md sm:text-lg hover:pr-5 hover:font-bold"> <i class="fa fa-phone"
                    aria-hidden="true"></i>
                تماس با ما</a>   
            <a href="/" class="mr-4 mt-3 text-md sm:text-lg hover:pr-5 hover:font-bold"> <i class="fa fa-home"
                    aria-hidden="true"></i>
                خانه</a>
        </div>
    </div>

    <div class="text shadow-primary-200 flex w-full sm:w-auto flex-col   ">
        <span class="w-full flex justify-center">
            <img class="h-32 w-72 logo " src="{{ asset('image/Logo light.png') }}">
        </span>
        <span class=" text-center text-md mt-2 font-bold">مارو در شبکه های اجتماعی دنبال کنید</span>
        <span class=" flex justify-center w-full mt-1 ">
            <ul class=" w-full mx-1 flex items-center justify-center ">
                <li class="mx-2">
                    <a target="_blank" class="group " title="کانال تلگرامی ما"
                        href="https://t.me/share/url?url=http://confectionary.ir/products/1&amp;text=قنادی اعتماد حلوا خرمایی">
                        <img class=" group-hover:scale-125  group-hover:rotate-[360deg] size-12 rounded-full object-cover overflow-hiddens "
                            src="/image/app/telegram.jpg">
                    </a>
                </li>
                <li class="mx-2">
                    <a target="_blank" class="group " title="کانال ایتا"
                        href="https://www.eitaa.com/share/url?url=قنادی اعتماد حلوا خرمایی">
                        <img class=" group-hover:scale-125  group-hover:rotate-[360deg] size-12 rounded-full object-cover overflow-hiddens "
                            src="/image/app/eitaa.jpg">
                    </a>
                </li>
                <li class="mx-2">
                    <a target="_blank" class="group " title="پیچ اینیستاگرام ما"
                        href="https://www.twitter.com/intent/tweet?url=http://confectionary.ir/products/1&amp;text=قنادی اعتماد حلوا خرمایی">
                        <img class=" group-hover:scale-125  group-hover:rotate-[360deg] size-12 rounded-full object-cover overflow-hiddens "
                            src="/image/app/instagram.jpg">
                    </a>
                </li>
            </ul>
        </span>
    </div>
    <div class="text shadow-primary-200 flex justify-center mt-4 md:mt-0 w-full sm:w-auto   ">
        <span class="flex size-full items-center justify-center ">
            <a href="">
                <img class="size-28 rounded-lg" src="{{ asset('image/enamad.png') }}" alt="">
            </a>
            <a href="">
                <img class="size-28 rounded-lg mr-2" src="{{ asset('image/samandehi.jpg') }}" alt="">
            </a>

        </span>
    </div>

</footer>
