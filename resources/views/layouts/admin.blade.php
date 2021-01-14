<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('inc.topbar')

    <main class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3">
                    <div class="container-fluid mb-5">
                        @include('admin.sidebar')
                    </div>
                </div>
                <div class="col">
                    <div class="container-fluid mb-5" id="admin-content">
                        @include('inc.messages')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@include('inc.footer')
</body>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
if (document.querySelector('input:not([type="hidden"])')) {
    document.querySelector('input:not([type="hidden"])').focus()
}
</script>

@yield('script')

</html>
