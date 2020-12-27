<div class="list-group shadow">

    <a href="{{route('admin.dashboard')}}" type="button"
       class="list-group-item list-group-item-action @if(Request::is('dashboard*')) active @endif"
    >@include('inc.icon', ['icon' => 'dashboard', 'fw' => true]) Dashboard</a>

    @foreach(['dish', 'event', 'page', 'picture', 'menu'] as $slug)
        <a href="{{route('admin.' . $slug . '.index')}}" type="button"
           class="list-group-item list-group-item-action @if(Request::is($slug . '*')) active @endif"
        >@include('inc.icon', ['icon' => $slug, 'fw' => true]) {{config('plural')[$slug]}}</a>
    @endforeach

    <a href="{{ route('logout') }}"
       type="button"
       class="list-group-item list-group-item-action"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >
        @include('inc.icon', ['icon' => 'logout', 'fw' => true]) Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST"
          style="display: none;"
    >
        @csrf
    </form>
</div>
