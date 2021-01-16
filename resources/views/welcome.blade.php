<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="bg_logo"></div>
<div class="flex-center position-ref full-height" style="overflow: hidden">
    <div class="content" style="position:relative;">

        @foreach(\App\Picture::onWelcomePage()->inRandomOrder()->limit(10)->get() as $key => $picture)
            <a @if(!empty($picture->dishes()->first()))
               href="{{route('dish.display', ['slug' => $picture->dishes()->first()->slug])}}"
               @endif
               title="{{$picture->title}}"
               class="d-block welcome-image wi{{$key}}"
               style="background-image:url('/img/{{$picture->filename}}');"
            ></a>
        @endforeach

        <div class="card" style="position:relative;z-index: 10;">
            <div class="title m-b-md mx-5 mt-2">
                <img src="{{url('/img/logo_xl.png')}}" alt="{{ config('app.name', 'Laravel') }}" class="img-fluid">
            </div>
            <div class="d-sm-flex justify-content-around welcome-navi mb-3">
                @foreach($pages as $page)
                    <a class="d-block d-md-inline" href="{{route('page.display', ['slug' => $page->slug])}}"
                    >{{$page->title}}</a>
                @endforeach
            </div>
            <div class="d-none d-xl-block"
                 style="position:absolute; top: 100px; right: -160px; transform: rotate(-10deg);max-width:280px"
            >
                @include('inc.extra.coming-up')
            </div>
            <div class="d-block d-xl-none mx-5 my-2">
                @include('inc.extra.coming-up')
            </div>
        </div>
    </div>
</div>
@include('inc.footer')
</body>
</html>
