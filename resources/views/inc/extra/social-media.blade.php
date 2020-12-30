<div class="right-col-box mb-5">
    <h3>Social Media</h3>
    <ul class="list-unstyled">
        @foreach(\App\Menu::getPagesByMenuLabel('Social Media') as $event)
            <li>
                <a href="{{route('page.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
            </li>
        @endforeach
    </ul>
</div>
