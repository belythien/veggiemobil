<div class="card-footer">
    <button type="submit" class="btn btn-success">
        @include('inc.icon', ['icon' => 'save']) Speichern
    </button>
    @if(isset($class))
        <a class="btn btn-outline-success" href="{{route('admin.' . $class . '.index')}}"
        >@include('inc.icon', ['icon' => 'cancel']) Abbrechen</a>
    @endif
</div>
