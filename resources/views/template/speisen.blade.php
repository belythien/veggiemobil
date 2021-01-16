@extends('page')

@section('template')
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
@endsection
