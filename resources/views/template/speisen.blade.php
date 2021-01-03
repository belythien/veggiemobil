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

                            @foreach(\App\Category::orderby('sort')->get() as $category)
                                <div class="mt-3">
                                    <h3 class="category-title bg-primary text-white p-3 mb-3">{{$category->title}}</h3>
                                    <div class="mb-3">{!! $category->text !!}</div>
                                    @include('inc.dishes', ['dishes' => $category->dishes])
                                </div>
                            @endforeach

                            @if($page->dishes()->count() > 0)
                                @foreach($page->dishes as $dish)
                                    @if($dish->pictures()->count() == 0)
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="anchor" id="{{$dish->slug}}"></div>
                                                <h2 class="text-success font-weight-bold pt-3">
                                                    <a href="{{route('dish.display', ['slug' => $dish->slug])}}">{{$dish->title}}</a>
                                                    @include('inc.sup-allergens', ['obj' => $dish])
                                                </h2>
                                                <p>{!! $dish->text !!}</p>
                                                <ul class="separated-list">
                                                    @foreach($dish->dips as $dip)
                                                        <li>{{$dip->title}}@include('inc.sup-allergens', ['obj' => $dip])</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row row-alternating-direction mb-4">
                                            <div class="col-lg-8">
                                                <div class="anchor" id="{{$dish->slug}}"></div>
                                                <h2 class="text-success font-weight-bold pt-3">
                                                    <a href="{{route('dish.display', ['slug' => $dish->slug])}}">{{$dish->title}}</a>
                                                    @include('inc.sup-allergens', ['obj' => $dish])
                                                </h2>
                                                <p>{!! $dish->text !!}</p>
                                                <ul class="separated-list">
                                                    @foreach($dish->dips as $dip)
                                                        <li>{{$dip->title}}@include('inc.sup-allergens', ['obj' => $dip])</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col">
                                                @foreach($dish->pictures as $picture)
                                                    @include('inc.picture', ['image' => $picture])
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            @endif
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
