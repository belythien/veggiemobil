@if(isset($class))
    <div class="btn-group btn-group-sm float-right">
        <button type="submit" class="btn btn-sm btn-primary">
            @include('inc.icon', ['icon' => 'filter'])
        </button>
        <a href="{{route('admin.' . $class . '.index')}}" class="btn btn-secondary btn-sm">
            @include('inc.icon', ['icon' => 'cancel'])
        </a>
    </div>
@endif
