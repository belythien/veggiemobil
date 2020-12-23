<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{url('/img/logo.png')}}" alt="{{ config('app.name', 'Veggiemobil') }}" style="max-height: 60px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(\App\Menu::where('label', 'Topbar')->first()->pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.display', ['slug' => $page->slug])}}"
                        >{{$page->title}}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</nav>
