<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @section('title') پنل کاربر @show </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/panel.css')
    @section('style') @show
</head>

<body class="sm:px-3 px-2 xl:pr-56 pt-12 ">




    @yield('main')

    @php
        if (!isset($min)) {
            $price_send = 0;
            $min = 0;
        }

    @endphp

    @component('panel.layout.navbar', ['min' => $min, 'price_send' => $price_send])
    @endcomponent
    @php
        if ($errors->any()) {
            $errors = $errors->all();
        } elseif (Session::get('status') == 'successful') {
            $errors = 'successful';
        }
    @endphp
    <link rel="stylesheet" href="{{ asset('css/polipop.min.css') }}" />
    <script src="{{ asset('js/polipop.min.js') }}"></script>
    <script>
        var errors = @json($errors);
        var polipop = new Polipop('mypolipop', {
            layout: 'popups',
            pool: 2,
            life: 2000,
        });
    </script>
    @vite('resources/js/crisp_chat.js')
    @vite('resources/js/panel.js')
    @section('script') @show
</body>

</html>
