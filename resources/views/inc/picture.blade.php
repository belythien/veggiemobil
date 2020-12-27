@if(isset($image))
    <img src="{{url('/img/' . $image->filename)}}" alt="" class="img-fluid img-border">
@endif
