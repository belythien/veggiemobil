@extends('page')

@section('template')
    <div class="mb-3">
        @include('inc.picture', ['image' => $page->pictures()->first()])
    </div>
@endsection
