@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-green">
                    <h1 class="float-left">{{$page->title}}</h1>
                    @auth()
                        <div class="float-right">
                            <a class="btn btn-success" href="{{route('admin.page.edit', ['page' => $page])}}"><i
                                    class="fa fa-edit"
                                ></i> Seite bearbeiten</a>
                        </div>
                    @endauth
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="mb-5">{!! $page->text !!}</div>
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
                        </div>
                        @include('inc.right-col')
                    </div>

                </div>

                @auth()
                    <div class="card-footer">
                        <a href="{{route('admin.page.edit', ['page' => $page])}}" class="btn btn-success"><i
                                class="fa fa-edit"
                            ></i> Bearbeiten</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
