@if(isset($events))
    @foreach($events as $event)
        <div
            class="row @if($event->pictures()->count() > 0) row-alternating-direction @endif my-5"
        >
            <div class="@if($event->pictures()->count() > 0) col-lg-6 @endif col">
                <h2>
                    <a href="{{route('event.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
                </h2>
                <div>{!! $event->text !!}</div>
                <div>{{$event->date}}</div>
            </div>
            @if($event->pictures()->count() > 0)
                <div class="col-lg-6">
                    <a href="{{route('event.display', ['slug' => $event->slug])}}">
                        @include('inc.picture', ['image' => $event->pictures()->first()])
                    </a>
                </div>
            @endif
        </div>
    @endforeach
@endif
