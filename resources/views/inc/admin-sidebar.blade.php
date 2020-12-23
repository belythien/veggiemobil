<div class="list-group shadow">

    <a href="{{route('admin.dashboard')}}" type="button"
       class="list-group-item list-group-item-action @if(Request::is('dashboard*')) active @endif"
    >Dashboard</a>

    <a href="{{route('admin.dish.index')}}" type="button"
       class="list-group-item list-group-item-action @if(Request::is('dish*')) active @endif"
    >Gerichte</a>

    <a href="{{route('admin.page.index')}}" type="button"
       class="list-group-item list-group-item-action @if(Request::is('page*')) active @endif"
    >Seiten</a>

    <a href="{{route('admin.picture.index')}}" type="button"
       class="list-group-item list-group-item-action @if(Request::is('picture*')) active @endif"
    >Bilder</a>

    <a href="{{route('admin.menu.index')}}" type="button"
       class="list-group-item list-group-item-action @if(Request::is('menu*')) active @endif"
    >Menüs</a>

    <a href="{{ route('logout') }}"
       type="button"
       class="list-group-item list-group-item-action"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST"
          style="display: none;"
    >
        @csrf
    </form>
</div>
