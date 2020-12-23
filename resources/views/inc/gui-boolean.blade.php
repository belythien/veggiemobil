@if(isset($value))
    @if($value == 1)
        <span class="bg-success text-white font-weight-bold px-3 py-1 rounded">Ja</span>
    @else
        <span class="bg-danger text-white font-weight-bold px-3 py-1 rounded">Nein</span>
    @endif
@endif
