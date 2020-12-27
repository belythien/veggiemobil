@if(isset($icon))
    @if(array_key_exists($icon,config('icons')))
        <i class="{{config('icons')[$icon]}} @if(isset($fw) && $fw == true) fa-fw @endif"></i>
    @endif
@endif
