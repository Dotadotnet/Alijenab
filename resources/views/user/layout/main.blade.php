<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @section('title') کافه عالیجناب @show </title>
    @section('header') @show
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">
    @vite('resources/css/user.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        (function() {
            try {
                const theme = localStorage.getItem('color-theme');
                if (theme) {
                    document.documentElement.classList.add(theme);
                } else {
                    const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    document.documentElement.classList.add(isDark ? 'dark' : 'light');
                }
            } catch (e) {}
        })();
    </script>
    @section('style') @show
</head>

<body class=" pt-24">
    @yield('main')
    @component('user.layout.navbar')
    @endcomponent
    @component('user.layout.footer')
    @endcomponent

    @vite('resources/js/user.js')
    {{-- <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "fb668e62-2aa3-4e8a-8c23-6bc77ce7e50e";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script> --}}
    @section('script') @show
    @vite('resources/js/crisp_chat.js')
</body>

</html>
