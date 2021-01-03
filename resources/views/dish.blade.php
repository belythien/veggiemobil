@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-green">
                    <div class="float-left">
                        <h1>{{$dish->title}}</h1>
                    </div>
                    @auth()
                        <div class="float-right">
                            <a class="btn btn-success" href="{{route('admin.dish.edit', ['dish' => $dish])}}"><i
                                    class="fa fa-edit"
                                ></i> Gericht bearbeiten</a>
                        </div>
                    @endauth
                </div>

                <div class="card-body">
                    <p>{!! $dish->text !!}</p>
                    @if($dish->dips()->count() > 0)
                        <ul class="separated-list mb-3">
                            @foreach($dish->dips as $dip)
                                <li>{{$dip->title}}@include('inc.sup-allergens', ['obj' => $dip])</li>
                            @endforeach
                        </ul>
                    @endif
                    @if($dish->allergens()->count() > 0)
                        <div class="text-sm text-secondary mb-3">
                            Allergene:
                            <ul class="separated-list">
                                @foreach($dish->allergens as $allergen)
                                    <li>{{$allergen->gui_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3" id="dish-picture">
                        @include('inc.picture', ['image' => $dish->pictures()->first()])
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{url()->previous()}}" class="btn btn-success">
                        @include('inc.icon', ['icon' => 'previous'])
                        Zurück</a>
                    @auth()
                        <a href="{{route('admin.dish.edit', ['dish' => $dish])}}" class="btn btn-success"><i
                                class="fa fa-edit"
                            ></i> Bearbeiten</a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection
