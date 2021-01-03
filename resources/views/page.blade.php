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

                <div class="card-body @if($page->slug == 'philosophie') bg-veggiemobil @endif">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="mb-5">{!! $page->text !!}</div>
                            @include('inc.dishes', ['dishes' => $page->dishes])
                            @include('inc.events')

                            @if(in_array($page->slug,['speisen', 'catering', 'truck-menu']))
                                <div class="row my-3 text-secondary text-sm">
                                    <div class="col-12 font-weight-bold" id="allergene">Allergene</div>
                                    @foreach(\App\Allergen::all() as $allergen)
                                        <div class="col-xl-2 col-lg-4 col-md-6">{{$allergen->id}}
                                            ) {{$allergen->name}}</div>
                                    @endforeach
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
