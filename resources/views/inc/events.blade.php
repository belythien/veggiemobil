@if(isset($events))
    @foreach($events as $event)
        @if(strlen($event->text) > 100)
            <h2 class="mt-5">
                <a href="{{route('event.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
            </h2>
            <div class="mb-3">{{$event->date}}</div>
            @if($event->pictures()->count() > 0)
                <a href="{{route('event.display', ['slug' => $event->slug])}}" class="mb-3 d-block">
                    @include('inc.picture', ['image' => $event->pictures()->first()])
                </a>
            @endif
            <div class="mt-3">{!! $event->text !!}</div>
            @if(!empty($event->external_url))
                <div><a href="{{$event->external_url}}" target="_blank">@include('inc.icon', ['icon' => 'external']) {{$event->external_url}}</a></div>
            @endif
        @else
            <div
                class="row @if($event->pictures()->count() > 0) row-alternating-direction @endif my-5"
            >
                <div class="@if($event->pictures()->count() > 0) col-lg-6 @endif col align-self-center">
                    <h2>
                        <a href="{{route('event.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
                    </h2>
                    <div>{{$event->date}}</div>
                    <div>{!! $event->text !!}</div>
                </div>
                @if($event->pictures()->count() > 0)
                    <div class="col-lg-6">
                        <a href="{{route('event.display', ['slug' => $event->slug])}}">
                            @include('inc.picture', ['image' => $event->pictures()->first()])
                        </a>
                    </div>
                @endif
            </div>
        @endif
    @endforeach
@endif
