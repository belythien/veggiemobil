@if(isset($page))
    <form method="POST">
        @csrf
        @foreach($page->dishes as $dish)
            <li class="@if($dish->live == 0) text-secondary @else font-weight-bold @endif">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-sm btn-outline-primary"
                            ic-post-to="{{route('admin.page.dish-move-down', ['page' => $page, 'dish' => $dish])}}"
                            ic-target="#page_dishes_{{$page->id}}"
                    >
                        @include('inc.icon', ['icon' => 'arrow-down'])
                    </button>
                    <button class="btn btn-sm btn-outline-primary"
                            ic-post-to="{{route('admin.page.dish-move-up', ['page' => $page, 'dish' => $dish])}}"
                            ic-target="#page_dishes_{{$page->id}}"
                    >
                        @include('inc.icon', ['icon' => 'arrow-up'])
                    </button>
                </div>
                {{$dish->title}}
            </li>
        @endforeach
    </form>
@endif
