<div class="container-fluid pb-0 mb-0 mt-5 justify-content-center bg-dark-transparent fixed-bottom">
    <footer class="container">
        <div class="row justify-content-center py-3">
            <div class="col-12">
                <div class="row ">
                    <div class="col-lg-6">
                        <small class="rights"><span>&#174;</span>
                            {{date('Y')}} Veggiemobil</small>

                        @foreach(\App\Menu::getPagesByMenuLabel('Footer') as $page)
                            <a href="{{route('page.display', ['slug' => $page->slug])}}">{{$page->title}}</a>
                        @endforeach

                    </div>
                    <div class="col-lg-6 text-right">
                        <!-- Authentication Links -->
                        @auth
                            <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            <a href="{{ route('logout') }}"
                               id="logout"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;"
                            >
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
