<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{url('/img/logo.svg')}}" alt="{{ config('app.name', 'Veggiemobil') }}" style="max-height: 60px">
            <img src="{{url('/img/logo_nur_text.png')}}" alt="{{ config('app.name', 'Veggiemobil') }}"
                 style="max-height: 60px"
            >
            {{--            <img src="{{url('/img/logo.png')}}" alt="{{ config('app.name', 'Veggiemobil') }}" style="max-height: 60px">--}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(\App\Menu::getPagesByMenuLabel('Topbar') as $page)
                    @if($page->slug == 'speisen')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{$page->title}}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('/speisen')}}">Alles</a></li>
                                @foreach(\App\Category::where('live', 1)->orderby('sort')->get() as $category)
                                    <li>
                                        <a class="dropdown-item" href="{{url('/speisen#' . $category->slug)}}">{{$category->gui_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link @if(Route::current()->slug == $page->slug) active @endif"
                               href="{{route('page.display', ['slug' => $page->slug])}}"
                            >{{$page->title}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>
    </div>
</nav>


{{--<nav class="navbar navbar-expand-lg navbar-dark bg-primary">--}}
{{--    <a class="navbar-brand" href="#">Navbar</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}
{{--    <div class="collapse navbar-collapse" id="main_nav">--}}
{{--        <ul class="navbar-nav">--}}
{{--            <li class="nav-item active"><a class="nav-link" href="#">Home </a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="#"> About </a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> More items </a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div> <!-- navbar-collapse.// -->--}}
{{--</nav>--}}
