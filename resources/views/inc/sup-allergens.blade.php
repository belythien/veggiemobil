@if(isset($obj))
    @foreach($obj->allergens as $allergen)
        <a href="#allergene" class="sup-allergen" title="{{$allergen->name}}">{{$allergen->id}}</a>
    @endforeach
@endif
