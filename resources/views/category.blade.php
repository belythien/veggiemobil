@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-green">
                    <div class="float-left">
                        <h1>{{$category->gui_name}}</h1>
                    </div>
                    @auth()
                        <div class="float-right">
                            <a class="btn btn-success"
                               href="{{route('admin.category.edit', ['category' => $category])}}"
                            ><i
                                    class="fa fa-edit"
                                ></i> Kategorie bearbeiten</a>
                        </div>
                    @endauth
                </div>

                <div class="card-body">
                    <div class="mb-3">{!! $category->text !!}</div>

                    @include('inc.dishes', ['dishes' => $category->dishes()->where('live', 1)->get()])
                </div>

                <div class="card-footer">
                    <a href="{{url()->previous()}}" class="btn btn-success">
                        @include('inc.icon', ['icon' => 'previous'])
                        Zurück</a>
                    @auth()
                        <a href="{{route('admin.category.edit', ['category' => $category])}}" class="btn btn-success"><i
                                class="fa fa-edit"
                            ></i> Bearbeiten</a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection
