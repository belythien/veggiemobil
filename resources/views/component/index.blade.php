@if(isset($class, $models))
    @component('component.admin-card-header', [
                                    'class' => $class,
                                    'btn_route' => route('admin.' . $class . '.create')
                    ])
        {{config('plural')[$class]}}
    @endcomponent

    <div class="card-body">
        @include('inc.pagination')
        {{ $slot }}
        @include('inc.pagination')
    </div>
@endif
