@extends('admin.layout.main')
@section('title')
    محصول
@endsection
@section('main')
    <?php
    $current_url = url()->current();
    $array_current_url = explode('/', $current_url);
    unset($array_current_url[0]);
    unset($array_current_url[1]);
    unset($array_current_url[2]);
    if ($array_current_url[3] == 'panel' && $array_current_url[5] == 'create') {
        $status = 'create';
    } else {
        $status = 'edite';
    }
    ?>



    <form enctype="multipart/form-data" method="POST"
        action="@if ($status == 'edite') {{ route('product.update', ['product' => $data->id]) }}@elseif($status == 'create'){{ route('product.store') }} @endif"
        autocomplete="off">
        @csrf
        @if ($status == 'edite')
            @method('PUT')
        @endif
        @php
            $inputs = [
                ['name' => 'name', 'text' => 'نام محصول', 'type' => 'fa'],
                [
                    'name' => 'nameEn',
                    'placeholder' => 'نام محصول را به انگلیسی بنویسید ( اختیاری )',
                    'text' => 'نام محصول به انگلیسی',
                    'type' => 'en',
                ],
            ];
        @endphp
        @if ($status == 'edite')
            <input name="id" value="{{ $data->id }}" class=" hidden">
            @php
                for ($i = 0; $i < count($inputs); $i++) {
                    foreach ($data->getAttributes() as $item => $value) {
                        if ($inputs[$i]['name'] == $item) {
                            $inputs[$i]['value'] = $value;
                        }
                    }
                }

                // dd($inputs);

            @endphp
        @endif
        <div class=" flex flex-col">
            <div class="grid md:grid-cols-2 gap-4 grid-cols-1">
                @foreach ($inputs as $input)
                    @component('admin.components.input', $input)
                    @endcomponent
                @endforeach
                <div class="">
                    <label class="  w-100">
                        <span class=" dark:text-white text-black mr-5">قیمت محصول :</span>
                        <br>
                        <div class="input-admin mt-3 ">
                            <div style=" width: 70px; justify-content:space-between;"
                                class="flex items-start flex-row-reverse">
                                <div
                                    class=" flex justify-center items-center p-1 rounded-full dark:hover:opacity-100 hover:opacity-100 cursor-pointer">
                                    <i class="fa fa-times " aria-hidden="true"></i>
                                </div>
                                <span class=" mx-1 flex justify-center items-center">
                                    <span>تومان</span>
                                </span>
                            </div>
                            <input value="{{ isset($data->price) ? $data->price : '' }}" style=" width: calc(100% - 70px); "
                                class="currency" type="text" name="priceShow" id="currency-field"
                                placeholder="1,000,000">
                        </div>
                    </label>
                </div>
                <input type="text" class="hidden" name="price">
                <div class="">
                    <label class="  w-100">
                        <span class=" dark:text-white text-black mr-6">درصد تحفیف :</span>
                        <br>
                        <div class="input-admin mt-3">
                            <div style=" width: 140px; justify-content:space-between;"
                                class="flex items-start flex-row-reverse">
                                <div
                                    class=" flex justify-center items-center p-1 rounded-full dark:hover:opacity-100 hover:opacity-100 cursor-pointer">
                                    <i class="fa fa-times " aria-hidden="true"></i>
                                </div>
                                <span class=" mx-1 flex justify-center items-center">
                                    <span>درصد تخفیف</span>
                                </span>
                            </div>
                            <input value="{{ isset($data->off) ? $data->off : '' }}" style=" width: calc(100% - 70px); "
                                class="currency" maxlength="3" type="text" name="off" id="currency-field"
                                data-type="num" placeholder="0">
                        </div>
                    </label>
                </div>
            </div>
            <br>
            <div class="mx-7 ">
                @component('admin.components.input', [
                    'name' => 'summery',
                    'text' => 'توضیحات',
                    'value' => isset($data->summery) ? $data->summery : '',
                    'type' => 'en-fa',
                    'placeholder' => 'توضیحات خود رو درمورد این محصول بنویسید',
                ])
                @endcomponent
            </div>
            <br>
            <br>
            <br>
            <textarea class=" hidden" name="caption"></textarea>
            <div class="justify-center flex items-center">
                <div class=" w-full sm:w-3/4">
                    <div class="document-editor">
                        <div class="document-editor__toolbar"></div>
                        <div class="document-editor__editable-container">
                            <div class="document-editor__editable">
                                @if (isset($data->caption))
                                    {!! $data->caption !!}
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="flex justify-center items-center">
                <div class="sm:w-1/2 w-full">
                    <label for="countries" class="dark:text-white  text-black">
                        <span>
                            دسته بندی مرتبط را وارد کنید :
                        </span>
                    </label>
                    <br>
                    <div class=" relative mt-3 ">
                        {{-- <div
                class="bg-gray-50 text-gray-900 text-lg dark:bg-gray-700 dark:text-white absolute left-1 pl-4 top-[12px]">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div> --}}
                        <select name="category" id="countries"
                            class="bg-gray-50 border group border-gray-300 text-gray-900 text-sm focus:rounded-none rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option class="group-hover:hidden group-focus:hidden group-focus:h-0" disabled selected>دسته
                                بندی را
                                انتخاب
                                کنید</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset($data->category) && $data->category == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                    </div>
                    </select>
                </div>
            </div>
        </div>


        <br>
        <br>

        <div class="justify-center flex items-center">
            <div class=" w-3/4 sm:w-1/2">
                <div class="en single">
                    <input type="file" class="filepond" name="thumbnail" data-allow-reorder="true" data-max-files="1">
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="justify-center flex items-center">
            <div class=" w-full sm:w-3/4">
                <div class="en ">
                    <input type="file" class="filepond" name="images[]" data-allow-reorder="true" data-max-files="10"
                        multiple>
                </div>
            </div>
        </div>



        <br>
        <button type="button" class="submit">
            @if ($status == 'edite')
                ثبت تغییرات
            @elseif ($status == 'create')
                ثبت دسته بندی
            @endif

        </button>
        </div>
    </form>
    <script>
        document.querySelector('input[name~=off]').addEventListener('keyup', (event) => {
            if (event.target.value) {
                if (parseInt(event.target.value) > 100) {
                    event.target.value = ''
                } else {
                    event.target.value = parseInt(event.target.value).toString()
                }
            }
        })

        const inputPrice = document.querySelector("input[name~=priceShow]");
        const format_fn_price = () => {
            let value = inputPrice.value.replace(/\D/g, "");
            document.querySelector("input[name~=price]").value = Number(value)
            if (value) {
                inputPrice.value = Number(value).toLocaleString("en-US");
            } else {
                inputPrice.value = "";
            }
        }
        format_fn_price()
        inputPrice.addEventListener("input", () => {
            format_fn_price()
        });
    </script>
    @php
        if (isset($data)) {
            $images = [];
            foreach (json_decode($data->images) as $image) {
                array_push($images, Storage::url($image));
            }
            $images = json_encode($images);
        }
    @endphp
    @if ($status == 'create')
        <script type="module">
            FilePond.create(
                document.querySelector('input[name*=images]'), {
                    labelIdle: "عکس های مورد نظر را بارگزاری کنید",
                    storeAsFile: true,
                    allowFileTypeValidation: true,
                    acceptedFileTypes: ['image/*'],
                });
            FilePond.create(
                document.querySelector('input[name*=thumbnail]'), {
                    labelIdle: "عکس کاور خود را بارگزاری کنید",
                    storeAsFile: true,
                    allowFileTypeValidation: true,
                    acceptedFileTypes: ['image/*'],
                });
        </script>
    @else
        <script type="module">
            let images_prev_json = @json($images);
            const images_prev = JSON.parse(images_prev_json)
            const file_upload = FilePond.create(
                document.querySelector('input[name*=images]'), {
                    labelIdle: 'عکس جدید را بار گزاری کنید',
                    storeAsFile: true,
                    allowFileTypeValidation: true,
                    acceptedFileTypes: ['image/*'],
                });
            file_upload.addFiles(images_prev);
            const file_upload_thumbnail = FilePond.create(
                document.querySelector('input[name*=thumbnail]'), {
                    labelIdle: "عکس کاور خود را بارگزاری کنید",
                    storeAsFile: true,
                    allowFileTypeValidation: true,
                    acceptedFileTypes: ['image/*'],
                });
            file_upload_thumbnail.addFile(@json(Storage::url($data->thumbnail)))
        </script>
    @endif
@endsection
