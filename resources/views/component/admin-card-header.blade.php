<div class="card-header card-header-green"
>@if(isset($class))@include('inc.icon', ['icon' => $class])@endif {{$slot}}
    @if(isset($class, $btn_route))
        <div class="float-right">
            <a class="btn btn-success" href="{{$btn_route}}">
                @include('inc.icon', ['icon' => 'add']) Neu</a>
        </div>
    @endif
</div>

