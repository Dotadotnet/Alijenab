@extends('admin.layout.main')
@section('title')
    اضافه کردن دسته بندی
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

    <style>
        .filepond--item {
            width: calc(100% - 0.5em);
        }
    </style>

    <form enctype="multipart/form-data" method="POST"
        action="@if ($status == 'edite') {{ route('category.update', ['category' => $data->id]) }}@elseif($status == 'create'){{ route('category.store') }} @endif"
        autocomplete="off">
        @csrf
        @if ($status == 'edite')
            @method('PUT')
        @endif
        @php
            $inputs = [
                [
                    'name' => 'name',
                    'text' => 'نام دسته بندی',
                    'type' => 'fa',
                    'placeholder' => 'نام دسته بندی را به فارسی وارد کنید',
                ],
                [
                    'name' => 'nameEn',
                    'text' => 'نام دسته بندی به انگلیسی',
                    'type' => 'en',
                    'placeholder' => 'نام دسته بندی را به انگلیسی وارد کنید ( اختیاری )',
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
            <div class=" grid sm:grid-cols-2 gap-7 mt-4 mx-7 grid-cols-1">
                @foreach ($inputs as $input)
                    @component('admin.components.input', $input)
                    @endcomponent
                @endforeach
            </div>
            <br>
            <div class="mx-7 ">
                @component('admin.components.input', [
                    'name' => 'caption',
                    'text' => 'توضیحات',
                    'type' => 'fa',
                    'value' => isset($data->caption) ? $data->caption : '',
                    'placeholder' => 'توضیحات خود رو درمورد این دسته بندی بنویسید',
                ])
                @endcomponent
            </div>
            <br>
            <br>
            <br>
            <div class="flex justify-center items-center">
                <div class=" sm:w-1/2 w-full ">
                    <div class="en">
                        <input type="file" class="filepond" name="image" data-allow-reorder="true" data-max-files="1">
                    </div>
                </div>
            </div>
            <button type="button" class="submit">
                @if ($status == 'edite')
                    ثبت تغییرات
                @elseif ($status == 'create')
                    ثبت دسته بندی
                @endif

            </button>
        </div>
    </form>


    @if ($status == 'create')
        <script type="module">
            FilePond.create(
                document.querySelector('input[type~=file]'), {
                    labelIdle: "عکس مورد نظر را بارگزاری کنید",
                    storeAsFile: true,
                }
            );
        </script>
    @else
        <script type="module">
            var host = window.location.protocol + "//" + window.location.host;

            const file_upload = FilePond.create(
                document.querySelector('input[type~=file]'), {
                    labelIdle: 'عکس جدید را بار گزاری کنید',
                    allowFileTypeValidation: true,
                    acceptedFileTypes: ['image/*'],
                    storeAsFile: true,
                }
            );

            let image_prev = host + "/storage/" + @json($data->img);
            console.log(image_prev);

            file_upload.addFile(image_prev);
        </script>
    @endif
@endsection
