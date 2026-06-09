@extends('panel.layout.main')
@section('title')
    سبد خرید
@endsection
@section('main')
    @php
        $user = Auth::guard('user')->user();
    @endphp

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>




    @php
        $all_count = 0;
    @endphp
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                        نام محصول
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تعداد
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-e-lg">
                        قیمت
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr
                        class="bg-white border-b rounded-lg dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 rounded-s-lg  py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['name'] }}
                        </th>
                        <td class="px-6 py-4">
                            @php
                                $all_count++;
                            @endphp
                            {!! $item['count'] . ' ' . '<span class="pb-4">' . '</span>' !!}
                        </td>
                        <td class="px-6 rounded-e-lg py-4">
                            {!! $item['price'] !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">مجموع :</th>
                    <td class="px-6 py-3">
                        <b class="ml-1">
                            {{ $all_count }}
                        </b>
                        قلم کالا
                    </td>
                    <td class="px-6 text-green-600 py-3">{!! $result !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if ($invoice)
        <div class="flex flex-wrap justify-center sm:justify-start">
            <span class="flex mt-3 items-center mr-0 sm:mr-5 p-2 bg-white rounded-lg dark:bg-gray-700">
                <i class="fa text-xl sm:text-2xl fa-credit-card-alt text-yellow-400" aria-hidden="true"></i>
                <b class="mr-2 text text-lg sm:text-xl">
                    {{ env('CART_OWER') }}
                </b>
            </span>
            <span class="flex mt-3 text-lg sm:text-xl text p-2 mr-2 items-center bg-white rounded-lg dark:bg-gray-700">
                <span> به نام </span><b class="mr-1">{{ env('NAME_OWER') }}</b>
            </span>
        </div>
    @endif
    <br>

    @if ($invoice)
        <div class="en border-2 border-blue-600 rounded-lg">
            <input type="file" class="filepond" name="image" data-max-files="1">
        </div>
    @endif


    <br>


    <form autocomplete="off" method="post" class="send-courier mt-12  overflow-hidden transition"
        action="/send-by-courier">
        @csrf


        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="flex justify-center items-center">
                <input type="text" class="hidden" name="location">
                <div class="disable-map div-all-map z-[40]">
                    <span class="absolute hidden accept-location z-[100000] top-3 right-3">
                        <button type="button"
                            class="focus:outline-none flex items-center font-bold text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span class="mr-1">تایید مقصد</span>
                        </button>
                    </span>
                    <a href="#map"
                        class="rounded-md bg-[rgba(0,0,0,0.7)] div-full z-[999] flex justify-center items-center cursor-pointer absolute size-full right-0 top-0">
                        <span class="text-lg text-white">{{ $text }}</span>
                    </a>
                    <div id="map" class="size-full rounded-md"></div>
                </div>
            </div>
            <div
                class=" grid sm:flex flex-col gap-2 sm:grid-cols-1 grid-cols-2  sm:mt-0 mt-7 sm:ml-7 ml-0 items-center justify-center">
                <div class="relative input-admin sm:w-full ">
                    <input value="{{ $address }}" name="address" type="text" 
                        id="floating_outlined"
                        class="block text   pl-4 pr-4 pb-2.5 pt-4 w-full text-md text-gray-900 
                        bg-white dark:bg-gray-800 rounded-lg  appearance-none focus:outline-none  peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-[16px] mr-3  text-blue-600 after:content-[':']
                         -translate-x-4 after:mr-0 after:font-bold duration-300 transform -translate-y-4  font-bold top-[0px]
                          z-10 origin-[0]  peer-placeholder-shown:-translate-x-0 peer-placeholder-shown:after:content-none peer-placeholder-shown:text-gray-500
                           peer-placeholder-shown:after:text-gray-500 px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100  peer-placeholder-shown:font-light
                             peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:font-bold peer-focus:top-[0px]   peer-focus:text-blue-600 peer-focus:after:content-[':'] peer-focus:-translate-x-4 peer-focus:after:mr-0
                              peer-focus:after:text-blue-600 peer-focus:after:font-bold scale-[1] peer-focus:scale-[1.1] peer-focus:-translate-y-4  rtl:peer-focus:left-auto start-1">
                        آدرس ( اختیاری ) </label>
                </div>

                <div class="relative sm:mt-7 input-admin sm:w-full ">
                    <input value="{{ $plate }}" maxlength="2" name="plate" type="number" data-type="num"
                        id="floating_outlined"
                        class="block text   pl-4 pr-4 pb-2.5 pt-4 w-full text-md text-gray-900 
                        bg-white dark:bg-gray-800 rounded-lg  appearance-none focus:outline-none  peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-[16px] mr-3  text-blue-600 after:content-[':']
                         -translate-x-4 after:mr-0 after:font-bold duration-300 transform -translate-y-4  font-bold top-[0px]
                          z-10 origin-[0]  peer-placeholder-shown:-translate-x-0 peer-placeholder-shown:after:content-none peer-placeholder-shown:text-gray-500
                           peer-placeholder-shown:after:text-gray-500 px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100  peer-placeholder-shown:font-light
                             peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:font-bold peer-focus:top-[0px]   peer-focus:text-blue-600 peer-focus:after:content-[':'] peer-focus:-translate-x-4 peer-focus:after:mr-0
                              peer-focus:after:text-blue-600 peer-focus:after:font-bold scale-[1] peer-focus:scale-[1.1] peer-focus:-translate-y-4  rtl:peer-focus:left-auto start-1">
                        پلاک</label>
                </div>
                <div class="relative sm:mt-7 input-admin sm:w-full ">
                    <input value="{{ $unit }}" maxlength="2" name="unit" type="number" data-type="num"
                        id="floating_outlined"
                        class="block text   pl-4 pr-4 pb-2.5 pt-4 w-full text-md text-gray-900 
                        bg-white dark:bg-gray-800 rounded-lg  appearance-none focus:outline-none  peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-[16px] mr-3  text-blue-600 after:content-[':']
                         -translate-x-4 after:mr-0 after:font-bold duration-300 transform -translate-y-4  font-bold top-[0px]
                          z-10 origin-[0]  peer-placeholder-shown:-translate-x-0 peer-placeholder-shown:after:content-none peer-placeholder-shown:text-gray-500
                           peer-placeholder-shown:after:text-gray-500 px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100  peer-placeholder-shown:font-light
                             peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:font-bold peer-focus:top-[0px]   peer-focus:text-blue-600 peer-focus:after:content-[':'] peer-focus:-translate-x-4 peer-focus:after:mr-0
                              peer-focus:after:text-blue-600 peer-focus:after:font-bold scale-[1] peer-focus:scale-[1.1] peer-focus:-translate-y-4  rtl:peer-focus:left-auto start-1">
                        واحد</label>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class=" flex justify-center ">
            <button type="button"
                class="text-white submit flex justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ثبت
                اطلاعات</button>
        </div>
        <br>
    </form>

    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css" />
    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>
    <script type="module">
        const tailwind_loader =
            `<div class="w-full text-center flex justify-center" role="status"><svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-white fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg><span class="sr-only">Loading...</span></div>`;
        window.postal_code = @json($postal_code);
        var area = 0.30023539733887;
        var tehran_location = [35.797598, 51.407850];
        var center_tehran = [35.697598, 51.407850];

        var user_data = @json(isset($location) ? $location : [35.697598, 51.40785]);
        var id = @json($id);
        window.id = id;
        var local_location = [user_data.latitude, user_data.longitude];
        var zoom = @json($zoom);
        if (Math.abs(local_location[0] - tehran_location[0]) > area || Math.abs(local_location[1] - tehran_location[1]) >
            area) {
            local_location = center_tehran;
        }
        const input_location = document.querySelector('input[name~=location]');
        document.querySelector('input[name~=location]').value = JSON.stringify([user_data.latitude, user_data.longitude]);
        const accept_button_fn = () => {


            axios.get("https://api.neshan.org/v5/reverse", {
                    params: {
                        lat: local_location[0],
                        lng: local_location[1],
                    },
                    headers: {
                        "Api-Key": "service.6eb261153d4446ae8c81c4f0d8cd780c",
                    },
                })
                .then((response) => {
                    let res = response.data;


                    let accept_location_span = document.querySelector('span.accept-location button span');
                    let accept_location_icon = document.querySelector('span.accept-location button i');
                    let accept_location = document.querySelector('span.accept-location button');

                    accept_location_span.innerHTML = tailwind_loader;
                    accept_location_icon.classList.add("hidden")
                    if (res.city == "تهران") {
                        let address = res.formatted_address;
                        address.replace("تهران", res.neighbourhood)
                        document.querySelector("input[name~=address]").value = address;
                        document.querySelector('a.div-full span').innerHTML = 'برای تغییر مقصد کلیک کنید';
                        zoom = 30;
                        input_location.value = JSON.stringify(local_location);
                        let url = window.location.protocol + "//" + window.location.host + '/change-location/' +
                            id +
                            '/' +
                            local_location[0] + '/' + local_location[1];
                        window.axios({
                            method: 'post',
                            url: url,
                        }).then(function(response) {}).catch(function(error) {}).then(function() {});
                        url = window.location.protocol + "//" + window.location.host + '/change-address/' + id +
                            '/' + address;
                        window.axios({
                            method: 'post',
                            url: url,
                        }).then(function(response) {}).catch(function(error) {}).then(function() {});

                        polipop.add({
                            content: 'مختصات شما با موفقیت ثبت شد',
                            title: 'فرایند با موفقیت به اتمام رسید',
                            type: 'success',
                        });
                        window.location.hash = '';
                    } else {
                        polipop.add({
                            content: 'مختصات شما خارج از تهران است',
                            title: 'مختصات شما خارج از محدوده ارسال ماست با پشتیبانی تماس بگیرید',
                            type: 'error',
                        });
                    }

                })




        };



        window.reloadMap = (location) => {
            setTimeout(() => {
                let map_element = document.querySelector('div#map');
                if (map_element && map_element.innerHTML) {
                    map_element.remove();
                    document.querySelector('div.div-all-map').innerHTML +=
                        '<div id="map" class="size-full rounded-md"></div>';
                }
                if (!document.querySelector('div.div-all-map').classList.contains('show-map')) {
                    local_location = JSON.parse(input_location.value)
                    if (Math.abs(local_location[0] - tehran_location[0]) > area || Math.abs(local_location[1] -
                            tehran_location[1]) > area) {
                        local_location = center_tehran;
                    }
                }


                const map = L.map('map', {
                    key: "web.9228d0cd37ab43b4a365de9a3763414e",
                    maptype: "dreamy",
                }).setView(local_location, zoom);
                const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
                const marker = L.marker(map.getBounds().getCenter()).addTo(map);

                function onMapMove(e) {
                    let loc = map.getBounds().getCenter();
                    local_location = [loc.lat, loc.lng];
                    marker.setLatLng({
                        lat: local_location[0],
                        lng: local_location[1]
                    });
                    if (Math.abs(local_location[0] - tehran_location[0]) > area || Math.abs(local_location[1] -
                            tehran_location[1]) > area) {
                        let accept_location_span = document.querySelector('span.accept-location button span');
                        let accept_location_icon = document.querySelector('span.accept-location button i');
                        let accept_location = document.querySelector('span.accept-location button');
                        if (accept_location) {
                            accept_location_span.innerHTML = 'در این محدوده ما ارسال نداریم';
                            accept_location_icon.classList.add('hidden')
                            accept_location.classList.add('opacity-50')
                            accept_location.removeEventListener('click', accept_button_fn)

                        }
                    } else {
                        let accept_location_span = document.querySelector('span.accept-location button span');
                        let accept_location_icon = document.querySelector('span.accept-location button i');
                        let accept_location = document.querySelector('span.accept-location button');
                        if (accept_location) {
                            accept_location_span.innerHTML = 'ثبت مکان';
                            accept_location_icon.classList.remove('hidden')
                            accept_location.classList.remove('opacity-50')
                            accept_location.addEventListener('click', accept_button_fn)
                        }
                    }
                }
                if (Math.abs(local_location[0] - tehran_location[0]) > area || Math.abs(local_location[1] -
                        tehran_location[1]) > area) {
                    let accept_location_span = document.querySelector('span.accept-location button span');
                    let accept_location_icon = document.querySelector('span.accept-location button i');
                    let accept_location = document.querySelector('span.accept-location button');
                    if (accept_location) {
                        accept_location_span.innerHTML = 'در این محدوده ما ارسال نداریم';
                        accept_location_icon.classList.add('hidden')
                        accept_location.classList.add('opacity-50')
                        accept_location.removeEventListener('click', accept_button_fn)

                    }
                } else {
                    let accept_location_span = document.querySelector('span.accept-location button span');
                    let accept_location_icon = document.querySelector('span.accept-location button i');
                    let accept_location = document.querySelector('span.accept-location button');
                    if (accept_location) {
                        accept_location_span.innerHTML = 'ثبت مکان';
                        accept_location_icon.classList.remove('hidden')
                        accept_location.classList.remove('opacity-50')
                        accept_location.addEventListener('click', accept_button_fn)
                    }
                }
                map.on('move', onMapMove);
                let ukrine_map = document.querySelector('div.leaflet-bottom.leaflet-right')
                if (ukrine_map) {
                    ukrine_map.remove()
                }




            }, 1000);
        }
        window.reloadMap(local_location)
        var time = 0;
        window.onresize = () => {
            if (document.querySelector('div.div-all-map').classList.contains('show-map')) {
                let map_element = document.querySelector('div#map');
                if (map_element && map_element.innerHTML) {
                    map_element.remove();
                    document.querySelector('div.div-all-map').innerHTML +=
                        '<div id="map" class="size-full rounded-md"></div>';
                }
                clearTimeout(time)
                time = setTimeout(() => {
                    window.reloadMap(local_location)
                }, 100);
            }
        };
    </script>
    @if ($invoice)
        <script type="module">
            setTimeout(() => {
                let image_prev = @json($invoice);
                const file_upload = window.FilePond.create(
                    document.querySelector('input[type~=file]'), {
                        labelIdle: 'فاکتور خود را ارسال کنید',
                        storeAsFile: true,
                        allowFileTypeValidation: true,
                        acceptedFileTypes: ['image/*'],
                    });
                document.querySelector('div.filepond--root').style.margin = '0px'
                console.log(document.querySelector('div.filepond--root'))
                document.querySelector('a.filepond--credits').remove()

                if (image_prev !== 'none') {
                    file_upload.addFile(image_prev);
                }
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                file_upload.setOptions({
                    server: {

                        revert: (uniqueFileId, load, error) => {
                            window.axios({
                                method: 'delete',
                                url: "/remove-invoice/" + window.id,
                            }).then(function(response) {}).catch(function(error) {}).then(function() {});
                            load();
                        },


                        process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                            options) => {

                            const formData = new FormData();
                            formData.append(fieldName, file, file.name);
                            const request = new XMLHttpRequest();
                            request.open('POST', '/add-invoice/' + window.id);
                            request.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                            request.upload.onprogress = (e) => {
                                progress(e.lengthComputable, e.loaded, e.total);
                            };
                            request.onload = function() {
                                if (request.status >= 200 && request.status < 300) {
                                    load(request.responseText);
                                } else {
                                    error('oh no');
                                }
                            };
                            request.send(formData);
                            return {
                                abort: () => {
                                    request.abort();
                                    abort();
                                },
                            };
                        },




                    },
                });
            }, 1000);
        </script>
    @endif
@endsection
