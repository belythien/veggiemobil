<div class="row">
    <div class="col-12 mb-3">
        <a class="btn btn-primary" href="{{route('admin.event.edit', ['event' => $event])}}">
            @include('inc.icon', ['icon' => 'previous'])
            Zurück zum Event
        </a>
        <a class="btn btn-primary" href="{{route('admin.event.upload-pictures', ['event' => $event])}}">
            @include('inc.icon', ['icon' => 'upload'])
            Neue Bilder hochladen
        </a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header card-header-green">Nicht verknüpfte Bilder</div>
            <div class="card-body">
                <div>Auf die Bilder klicken, um sie zu ver- bzw. entlinken.</div>
                <div>{{sizeof($event->not_linked_pictures)}} Bilder</div>
                <form method="POST">
                    @csrf
                    <div class="row" ic-target="#admin-content">
                        @foreach($event->not_linked_pictures as $picture)
                            <div class="col col-xxl-3 col-xl-4 col-lg-6 mb-3 position-relative cursor-pointer"
                                 ic-post-to="{{route('admin.event.link-picture', ['event' => $event, 'picture' => $picture])}}"
                            >
                                @include('inc.picture', ['image' => $picture])
                                <div class="text-sm">{{$picture->title}}</div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header card-header-green">Verknüpfte Bilder</div>
            <div class="card-body">
                <div>Auf die Bilder klicken, um sie zu ver- bzw. entlinken.</div>
                <div>{{$event->pictures()->count()}} Bilder</div>
                <form method="POST">
                    @csrf
                    <div class="row" ic-target="#admin-content">
                        @foreach($event->pictures as $picture)
                            <div class="col col-xxl-3 col-xl-4 col-lg-6 mb-3 position-relative cursor-pointer"
                                 ic-post-to="{{route('admin.event.unlink-picture', ['event' => $event, 'picture' => $picture])}}"
                            >
                                @include('inc.picture', ['image' => $picture])
                                <div class="text-sm">{{$picture->title}}</div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
