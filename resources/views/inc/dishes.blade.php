@if(isset($dishes))
    @foreach($dishes as $dish)
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
                <div class="col-lg-8 align-self-center">
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
                <div class="col-lg-4">
                    @foreach($dish->pictures as $picture)
                        <a href="{{route('dish.display', ['slug' => $dish->slug])}}">@include('inc.picture', ['image' => $picture])</a>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif
