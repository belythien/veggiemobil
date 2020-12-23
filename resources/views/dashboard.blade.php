@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6">
                            <div class="box mb-3">
                                <div class="box-header">
                                    Seiten
                                    <a class="btn btn-sm btn-light float-right"
                                        href="{{route('admin.page.create')}}"><i
                                            class="fa fa-plus-circle fa-fw"
                                        ></i></a>
                                </div>
                                <div class="box-body">
                                    @foreach($pages as $page)
                                        <div class="alternating py-2 px-3">
                                            <a class="d-block" href="{{route('admin.page.edit', ['page' => $page])}}"
                                            >{{$page->title}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="box mb-3">
                                <div class="box-header">
                                    Gerichte
                                    <a class="btn btn-sm btn-light float-right"
                                       href="{{route('admin.page.create')}}"><i
                                            class="fa fa-plus-circle fa-fw"
                                        ></i></a>
                                </div>
                                <div class="box-body">
                                    @foreach($pages as $page)
                                        <div class="alternating py-2 px-3">
                                            <a class="d-block" href="{{route('admin.page.edit', ['page' => $page])}}"
                                            >{{$page->title}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="box mb-3">
                                <div class="box-header">
                                    Events
                                    <a class="btn btn-sm btn-light float-right"
                                       href="{{route('admin.page.create')}}"><i
                                            class="fa fa-plus-circle fa-fw"
                                        ></i></a>
                                </div>
                                <div class="box-body">
                                    @foreach($pages as $page)
                                        <div class="alternating py-2 px-3">
                                            <a class="d-block" href="{{route('admin.page.edit', ['page' => $page])}}"
                                            >{{$page->title}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
