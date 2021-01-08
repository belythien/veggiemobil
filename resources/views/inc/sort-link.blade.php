@if(isset($field, $class, $orderby))
    @php($route = 'admin.' . $class . '.index')
    @php($dir = isset($orderby, $dir) && $orderby == $field && $dir == 'asc' ? 'desc' : 'asc')
    @if($orderby == $field)
        <a href="{{route($route, ['orderby' => $field, 'dir' => $dir])}}" class="text-info">
            {{__('field.' . $field)}}
            @include('inc.icon', ['icon' => 'sort-' . ($dir == 'asc' ? 'desc' : 'asc')])
        </a>
    @else
        <a href="{{route($route, ['orderby' => $field, 'dir' => $dir])}}">{{__('field.' . $field)}}</a>
    @endif
@endif
