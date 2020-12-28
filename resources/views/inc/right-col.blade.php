<div class="right-col col-xl-3">
    <div class="right-col-box mb-3">
        <h3>Demnächst</h3>
        @foreach(\App\Event::getNextEvents() as $event)
            <div class="mb-3">
                <div class="font-weight-bold">
                    <a href="{{route('event.show', ['event' => $event])}}">{{$event->title}}</a>
                </div>
                <div>{{$event->date}}</div>
            </div>
        @endforeach
    </div>

    <div class="right-col-box mb-3">
        <h3>Social Media</h3>
        <ul class="list-unstyled">
            @foreach(\App\Menu::where('label', 'Social Media')->first()->pages as $event)
                <li>
                    <a href="{{route('page.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
