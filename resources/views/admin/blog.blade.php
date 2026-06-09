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



    <form enctype="multipart/form-data" method="POST"
        action="@if ($status == 'edite') {{ route('blog.update', ['blog' => $data->id]) }}@elseif($status == 'create'){{ route('blog.store') }} @endif"
        autocomplete="off">
        @csrf
        @if ($status == 'edite')
            @method('PUT')
        @endif
        @php
            $inputs = [
                [
                    'name' => 'title',
                    'placeholder' => "عنوان را وارد کنید",
                    'text' => 'عنوان',
                    'type' => 'fa-num',
                ],
                [
                    'name' => 'title_en',
                    'text' => 'عنوان به انگیسی',
                    'placeholder' => 'عنوان بلاگ را به انگلیسی وارد کنید ( اختیاری )',
                    'type' => 'en-num',
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
            <div class="grid md:grid-cols-2 gap-5 mt-2 px-5 grid-cols-1">
                @foreach ($inputs as $input)
                    @component('admin.components.input', $input)
                    @endcomponent
                @endforeach
                @if ($status == 'edite')
                    <div class="flex justify-end pb-1 items-end">
                        <a href="/blog/{{ $data->id }}"
                            class="focus:outline-none hover:text-white show-order-info text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-lg rounded-lg text-sm size-11 flex justify-center items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                            <i class="fa text-2xl fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                @endif
            </div>
 <div class="mx-7 mt-6 ">
                @component('admin.components.input', [
                    'name' => 'caption',
                    'text' => 'توضیحات',
                    'type' => 'en-fa',
                    'value' => isset($data->caption) ? $data->caption : '',
                    'placeholder' => 'توضیحات خود رو درمورد این دسته بندی بنویسید',
                ])
                @endcomponent
            </div>
             <div class="justify-center mt-12 flex items-center">
            <div class=" w-3/4 sm:w-1/2">
                <div class="en single">
                    <input type="file" class="filepond" name="thumbnail" data-allow-reorder="true" data-max-files="1">
                </div>
            </div>
        </div>
            <br>
            <br>
            <textarea class="hidden" name="amount"></textarea>
            <div class="document-editor">
                <div class="document-editor__toolbar"></div>
                <div class="document-editor__editable-container">
                    <div class="document-editor__editable">
                        @if (isset($data->amount))
                            {!! $data->amount !!}
                        @else
                            <p>توضیحات ...</p>
                        @endif
                    </div>
                </div>
            </div>
            <br>

            <br>
            <button type="button" class="submit">
                @if ($status == 'edite')
                    ثبت تغییرات
                @elseif ($status == 'create')
                    ثبت بلاگ
                @endif

            </button>
        </div>
    </form>
    @if ($status == 'create')
        <script type="module">
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
