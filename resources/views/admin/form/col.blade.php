@if(isset($field))
    @if(isset($model))
        @php($value = old($field, $model->$field))
    @else
        @php($value = old($field))
    @endif
    <div class="col @if(isset($size)) col-lg-{{$size}}@else col-lg-12 @endif">

        <div class="form-group">
            <label for="{{$field}}" class="font-weight-bold">{{__('field.' . $field)}}</label>
{{--{{dd($errors)}}--}}
            @if(!isset($type) || $type=='text')
                <input class="form-control @if($errors->has($field)) is-invalid @endif"
                       id="{{$field}}"
                       @if(isset($readonly) && $readonly == true) readonly @endif
                       name="{{$field}}"
                       @if(isset($help))
                       aria-describedby="{{$field}}_help"
                       @endif
                       value="{{$value}}"
                       @if(isset($placeholder))
                       placeholder="{{$placeholder}}"
                    @endif
                >

            @elseif($type == 'textarea')
                <textarea class="form-control ckeditor" name="{{$field}}" id="{{$field}}" cols="30" rows="10"
                >{{$value}}</textarea>

            @elseif($type=='number')
                <input class="form-control"
                       type="number"
                       @if(isset($readonly) && $readonly == true) readonly @endif
                       id="{{$field}}"
                       name="{{$field}}"
                       @if(isset($help))
                       aria-describedby="{{$field}}_help"
                       @endif
                       value="{{$value}}"
                       @if(isset($placeholder))
                       placeholder="{{$placeholder}}"
                    @endif
                >

            @elseif($type == 'date')
                @if(!empty($value))
                    @php($value = $value->format('Y-m-d'))
                @endif
                <input class="form-control"
                       type="date"
                       @if(isset($readonly) && $readonly == true) readonly @endif
                       id="{{$field}}"
                       name="{{$field}}"
                       @if(isset($help))
                       aria-describedby="{{$field}}_help"
                       @endif
                       value="{{$value}}"
                       @if(isset($placeholder))
                       placeholder="{{$placeholder}}"
                    @endif
                >

            @elseif($type == 'checkbox')
                @if(isset($data))
                    <div class="row">
                        @foreach($data as $object)
                            <div class="@if(isset($colSize)) col-{{$colSize}} @else col-lg-2 @endif">
                                <label>
                                    <input type="checkbox" name="{{$field}}[{{$object->id}}]" value="{{$object->id}}"
                                           @if(isset($model) && $model->$field->contains($object->id)) checked @endif
                                    >
                                    {{$object->gui_name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif

            @elseif($type == 'radio')
                @if(!isset($data))
                    @php($data = [1 => 'Ja', 0 => 'Nein'])
                    @if(!isset($default))
                        @php($default = 1)
                    @endif
                @endif
                <div>
                    @foreach($data as $key => $radio)
                        <label>
                            <input type="radio"
                                   name="{{$field}}"
                                   @if(isset($default) && $default == $key)
                                   checked
                                   @endif
                                   value="{{$key}}"
                                   id="{{$field}}_{{$key}}"
                            > {{__($radio)}}
                        </label>
                    @endforeach
                </div>

            @endif

            @if(isset($help))
                <small id="{{$field}}_help" class="form-text text-muted">{{$help}}</small>
            @endif
        </div>
    </div>
@endif
