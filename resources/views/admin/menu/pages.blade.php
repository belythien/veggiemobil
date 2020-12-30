@if(isset($menu))
    <form method="POST">
        @csrf
        @foreach($menu->pages as $page)
            <li class="@if($page->live == 0) text-secondary @else font-weight-bold @endif">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-sm btn-outline-primary"
                            ic-post-to="{{route('admin.menu.page-move-down', ['menu' => $menu, 'page' => $page])}}"
                            ic-target="#menu_pages_{{$menu->id}}"
                    >
                        @include('inc.icon', ['icon' => 'arrow-down'])
                    </button>
                    <button class="btn btn-sm btn-outline-primary"
                            ic-post-to="{{route('admin.menu.page-move-up', ['menu' => $menu, 'page' => $page])}}"
                            ic-target="#menu_pages_{{$menu->id}}"
                    >
                        @include('inc.icon', ['icon' => 'arrow-up'])
                    </button>
                </div>
                {{$page->title}}
            </li>
        @endforeach
    </form>
@endif
