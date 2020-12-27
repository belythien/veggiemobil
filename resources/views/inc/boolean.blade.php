@if(isset($value, $icPostTo))
    <form method="POST">
        @csrf
        @if($value == 1)
            <button ic-post-to="{{$icPostTo}}"
                    ic-target="closest td"
                    class="btn btn-sm font-weight-bold btn-success"
            >Ja
            </button>
        @else
            <button ic-post-to="{{$icPostTo}}"
                    ic-target="closest td"
                    class="btn btn-sm font-weight-bold btn-danger"
            >Nein
            </button>
        @endif
    </form>
@endif
