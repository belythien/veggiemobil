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

                            @foreach(\App\Category::where('live', 1)->orderby('sort')->get() as $category)
                                <div class="anchor" id="{{$category->slug}}"></div>
                                <div class="mt-3">
                                    <h3 class="category-title bg-primary text-white p-3 mb-3">{{$category->title}}</h3>
                                    <div class="mb-3">{!! $category->text !!}</div>
                                    @include('inc.dishes', ['dishes' => $category->dishes()->where('live', 1)->get()])
                                </div>
                            @endforeach

                            <div class="row my-3 text-secondary text-sm">
                                <div class="col-12 font-weight-bold" id="allergene">Allergene</div>
                                @foreach(\App\Allergen::all() as $allergen)
                                    <div class="col-xl-2 col-lg-4 col-md-6">{{$allergen->id}}
                                        ) {{$allergen->name}}</div>
                                @endforeach
                            </div>

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
