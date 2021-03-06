@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-green"><i class="fa fa-tachometer-alt fa-fw"></i> Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6">
                            <div class="box mb-3">
                                <div class="box-header">
                                    Seiten
                                    <a class="btn btn-sm btn-light float-right"
                                       href="{{route('admin.page.create')}}"
                                    ><i
                                            class="fa fa-plus-circle fa-fw"
                                        ></i></a>
                                </div>
                                <div class="box-body scrollbox" style="max-height: 500px">
                                    @if(!empty($pages))
                                        @foreach($pages as $page)
                                            <div class="alternating py-2 px-3">
                                                <a href="{{route('admin.page.edit', ['page' => $page])}}"
                                                   class="d-block"
                                                >{{$page->title}}</a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="box mb-3">
                                <div class="box-header">
                                    Gerichte
                                    <a class="btn btn-sm btn-light float-right"
                                       href="{{route('admin.dish.create')}}"
                                    ><i
                                            class="fa fa-plus-circle fa-fw"
                                        ></i></a>
                                </div>
                                <div class="box-body scrollbox" style="max-height: 500px">
                                    @if(!empty($dishes))
                                        @foreach($dishes as $dish)
                                            <div class="alternating py-2 px-3">
                                                <a href="{{route('admin.dish.edit', ['dish' => $dish])}}"
                                                >{{$dish->title}}
                                                    @include('inc.sup-allergens', ['obj' => $dish])
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6">
                            <div class="box mb-3">
                                <div class="box-header">
                                    Events
                                    <a class="btn btn-sm btn-light float-right"
                                       href="{{route('admin.event.create')}}"
                                    ><i
                                            class="fa fa-plus-circle fa-fw"
                                        ></i></a>
                                </div>
                                <div class="box-body scrollbox" style="max-height: 500px">
                                    @if(!empty($events))
                                        @foreach($events as $event)
                                            <div class="alternating py-2 px-3">
                                                <a href="{{route('admin.event.edit', ['event' => $event])}}"
                                                   class="d-block"
                                                >{{$event->title}}</a>
                                                <div class="text-sm">{{$event->date}}</div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
