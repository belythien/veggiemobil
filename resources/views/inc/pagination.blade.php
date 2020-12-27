@if(isset($models))
    <div>
        <div>{{__(':cnt von :total', ['cnt' => $models->count(), 'total' => $models->total()])}}</div>
        <div>{{$models->links()}}</div>
    </div>
@endif
