<div class="right-col-box mb-5">
    <h3>Social Media</h3>
    <ul class="list-unstyled mb-0">
        @foreach(\App\Menu::getPagesByMenuLabel('Social Media') as $page)
            <li>
                <a
                    @if(!empty($page->external_url))
                    href="{{$page->external_url}}"
                    target="_blank"
                    @else
                    href="{{route('page.display', ['slug' => $page->slug])}}"
                    @endif
                >{{$page->title}}</a>
            </li>
        @endforeach
    </ul>
</div>
