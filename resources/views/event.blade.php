@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-green">
                    <div class="float-left">
                        <h1>{{$event->title}}</h1>
                        <div>{{$event->date}}</div>
                    </div>
                    @auth()
                        <div class="float-right">
                            <a class="btn btn-success" href="{{route('admin.event.edit', ['event' => $event])}}"><i
                                    class="fa fa-edit"
                                ></i> Event bearbeiten</a>
                        </div>
                    @endauth
                </div>

                <div class="card-body">
                    {!! $event->text !!}

                    @if($event->pictures()->count() > 1)
                        <div class="mb-2">
                            <button id="previous-button" onclick="previousPicture()"
                                    class="btn btn-sm btn-primary"
                            >@include('inc.icon', ['icon' => 'previous'])
                                Voriges Bild
                            </button>
                            <button id="next-button" onclick="nextPicture()"
                                    class="btn btn-sm btn-primary float-right"
                            >@include('inc.icon', ['icon' => 'next'])
                                Nächstes Bild
                            </button>
                        </div>
                    @endif
                    <div class="mb-3" id="event-picture">
                        @include('inc.picture', ['image' => $event->pictures()->first()])
                    </div>
                    @if($event->pictures()->count() > 1)
                        <div class="d-none d-lg-flex mb-3">
                            @foreach($event->pictures as $key => $picture)
                                <span onclick="switchPicture(this)"
                                      class="event-picture-thumbnail cursor-pointer d-inline-block"
                                      thumbnail="{{$key}}"
                                >@include('inc.picture', ['image' => $picture])</span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{url()->previous()}}" class="btn btn-success">
                        @include('inc.icon', ['icon' => 'previous'])
                        Zurück</a>
                    @auth()
                        <a href="{{route('admin.event.edit', ['event' => $event])}}" class="btn btn-success"><i
                                class="fa fa-edit"
                            ></i> Bearbeiten</a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    let picture_index = 0
    document.querySelector('.event-picture-thumbnail').classList.add('event-picture-thumbnail-selected')

    function switchPicture (span) {
        picture_index = span.getAttribute('thumbnail')

        let img_src = span.firstChild.src
        document.querySelector('#event-picture img').src = img_src

        let thumbnails = document.querySelectorAll(".event-picture-thumbnail");

        for (let i = 0; i < thumbnails.length; i++) {
            thumbnails[i].classList.remove('event-picture-thumbnail-selected')
        }

        span.classList.add('event-picture-thumbnail-selected')
    }

    function nextPicture () {
        let cnt_pictures = document.getElementsByClassName('event-picture-thumbnail').length
        if (cnt_pictures > 0) {
            if (picture_index < cnt_pictures - 1) {
                picture_index++
            } else {
                picture_index = 0
            }
            switchPicture(document.getElementsByClassName('event-picture-thumbnail')[ picture_index ])
        }
    }

    function previousPicture () {
        let cnt_pictures = document.getElementsByClassName('event-picture-thumbnail').length
        if (cnt_pictures > 0) {
            if (picture_index > 0) {
                picture_index--
            } else {
                picture_index = cnt_pictures - 1
            }
            switchPicture(document.getElementsByClassName('event-picture-thumbnail')[ picture_index ])
        }
    }
    </script>
@endsection
