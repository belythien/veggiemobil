@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{$page->title}}</h1></div>

                <div class="card-body">
                    {!! $page->text !!}

                    @foreach($page->dishes as $dish)
                        <div class="row mb-2">
                            <div class="col-lg-8">
                                <h3 class="text-success font-weight-bold pt-3">{{$dish->title}}</h3>
                                <p>{!! $dish->text !!}</p>
                            </div>
                            <div class="col">
                                @foreach($dish->pictures as $picture)
                                    <img src="{{url('/img/' . $picture->filename)}}" class="img-thumbnail"
                                         alt=""
                                    >
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
