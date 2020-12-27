@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-green"><h1>{{$picture->title}}</h1></div>
                <div class="card-body">
                    {!! $picture->text !!}
                    <div class="text-center">
                        @include('inc.picture', ['image' => $picture])
                    </div>
                </div>

                @auth()
                    <div class="card-footer">
                        <a href="{{route('admin.picture.edit', ['picture' => $picture])}}" class="btn btn-success"><i
                                class="fa fa-edit"
                            ></i> Bearbeiten</a>
                        <a class="btn btn-outline-success" href="{{url()->previous()}}"><i class="fa fa-arrow-circle-left"
                            ></i> Zurück</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
