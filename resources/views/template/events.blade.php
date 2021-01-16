@extends('page')

@section('template')
    @if(isset($future_events))
        <div class="mt-3">
            <h3 class="category-title bg-primary text-white p-3 mb-3">Demnächst</h3>
            @include('inc.events', ['events' => $future_events])
        </div>
    @endif
    @if(isset($past_events))
        <div class="mt-3">
            <h3 class="category-title bg-primary text-white p-3 mb-3">Highlights</h3>
            @include('inc.events', ['events' => $past_events])
        </div>
    @endif
@endsection

