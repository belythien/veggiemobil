@if(isset($category))
    <form method="POST">
        @csrf
        @foreach($category->dishes as $dish)
            <li class="@if($dish->live == 0) text-secondary @else font-weight-bold @endif">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-sm btn-outline-primary"
                            ic-post-to="{{route('admin.category.dish-move-down', ['category' => $category, 'dish' => $dish])}}"
                            ic-target="#category_dishes_{{$category->id}}"
                    >
                        @include('inc.icon', ['icon' => 'arrow-down'])
                    </button>
                    <button class="btn btn-sm btn-outline-primary"
                            ic-post-to="{{route('admin.category.dish-move-up', ['category' => $category, 'dish' => $dish])}}"
                            ic-target="#category_dishes_{{$category->id}}"
                    >
                        @include('inc.icon', ['icon' => 'arrow-up'])
                    </button>
                </div>
                {{$dish->title}}
            </li>
        @endforeach
    </form>
@endif
