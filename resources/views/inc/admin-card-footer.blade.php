<div class="card-footer">
    <button type="submit" class="btn btn-danger">
        @include('inc.icon', ['icon' => 'save']) Speichern
    </button>
    @if(isset($slug))
        <a class="btn btn-outline-success" href="{{route('admin.' . $slug . '.index')}}"
        >@include('inc.icon', ['icon' => 'cancel']) Abbrechen</a>
    @endif
</div>
