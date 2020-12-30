@if(isset($model, $class))
    <form method="POST">
        @csrf
        <div class="btn-group">
            @if(Route::has($class . '.display'))
                <a href="{{route($class . '.display', ['slug' => $model->slug])}}"
                   class="btn btn-sm btn-success"
                ><i
                        class="fa fa-eye fa-fw"
                    ></i></a>
            @endif

            <a href="{{route('admin.'. $class . '.edit', [$class => $model])}}"
               class="btn btn-sm btn-success"
            >@include('inc.icon', ['icon' => 'edit', 'fw' => true])</a>

            <button type="button"
                    ic-delete-from="{{route('admin.' . $class . '.destroy', [$class => $model])}}"
                    ic-confirm="{{$model->gui_name}} wirklich löschen?"
                    class="btn btn-sm btn-danger"
            >@include('inc.icon', ['icon' => 'delete', 'fw' => true])
            </button>
        </div>
    </form>
@endif
