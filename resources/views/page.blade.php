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
                    {!! $page->text !!}

                    @foreach($page->dishes as $dish)
                        <div class="row row-alternating-direction mb-2">
                            <div class="col-lg-8">
                                <h3 class="text-success font-weight-bold pt-3">{{$dish->title}}</h3>
                                <p>{!! $dish->text !!}</p>
                            </div>
                            <div class="col">
                                @foreach($dish->pictures as $picture)
                                    @include('inc.picture', ['image' => $picture])
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
