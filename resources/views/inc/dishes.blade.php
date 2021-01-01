@if($page->dishes()->count() > 0)
    @foreach($page->dishes as $dish)
        <div class="row row-alternating-direction mb-2">
            <div class="col-lg-8">
                <div class="anchor" id="{{$dish->slug}}"></div>
                <h3 class="text-success font-weight-bold pt-3">
                    {{$dish->title}}
                    @include('inc.sup-allergens', ['obj' => $dish])
                </h3>
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
    @endforeach

    <div class="row my-3 text-secondary text-sm">
        <div class="col-12 font-weight-bold" id="allergene">Allergene</div>
        @foreach(\App\Allergen::all() as $allergen)
            <div class="col-xl-2 col-lg-4 col-md-6">{{$allergen->id}}) {{$allergen->name}}</div>
        @endforeach
    </div>
@endif
