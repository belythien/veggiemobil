@if(\App\Event::getNextEvents()->count() > 0)
    <div class="right-col-box bg-danger mb-5">
        <h3>Demnächst</h3>
        @foreach(\App\Event::getNextEvents() as $event)
            <div class="mb-3">
                <div class="font-weight-bold">
                    <a href="{{route('event.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
                </div>
                <div>{{$event->date}}</div>
            </div>
        @endforeach
    </div>
@endif
