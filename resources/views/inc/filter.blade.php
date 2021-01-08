@if(isset($field))
    @if(!isset($type) || $type != 'select')
        <input type="{{isset($type) ? $type : 'text'}}"
               name="{{$field}}"
               id="{{$field}}"
               class="form-control form-control-sm"
               @if(isset($filter) && !empty($filter[$field]))
               value="{{$filter[$field]}}"
            @endif
        >
    @elseif($type == 'select')
        @if(!isset($data))
            @php($data = ['yes' => 'Ja', 'no' => 'Nein'])
        @endif
        <select name="{{$field}}" id="{{$field}}" class="form-control form-control-sm"
                onchange="this.form.submit()"
        >
            <option value="any"
                    @if(isset($filter) && !empty($filter[$field]) && $filter[$field] == "any")
                    selected
                @endif
            >------
            </option>
            @foreach($data as $key => $value)
            <option value="{{$key}}"
                    @if(isset($filter) && !empty($filter[$field]) && $filter[$field] == $key)
                    selected
                @endif
            >{{$value}}
            </option>
            @endforeach
        </select>
    @endif
@endif
