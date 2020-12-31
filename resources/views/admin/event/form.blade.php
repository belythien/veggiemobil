@if(!isset($model))
    @include('admin.form.col', ['field' => 'title',        'size' => 12, 'type' => 'text' ])
@else
    @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
    @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])
@endif

@include('admin.form.col', ['field' => 'text',        'size' => 12, 'type' => 'textarea' ])

@include('admin.form.col', ['field' => 'date_from',    'size' => 6,  'type' => 'date' ])
@include('admin.form.col', ['field' => 'date_to',      'size' => 6,  'type' => 'date' ])

@include('admin.form.col', ['field' => 'external_url', 'size' => 12, 'type' => 'text' ])

@include('admin.form.col', ['field' => 'live',        'size' => 4,  'type' => 'radio' ])
@include('admin.form.col', ['field' => 'publication', 'size' => 4,  'type' => 'date' ])
@include('admin.form.col', ['field' => 'expiration',  'size' => 4,  'type' => 'date' ])


<div class="col-12">
    <h4 class="my-4">
        Bilder
        <div class="btn-group float-right">
            <a class="btn btn-outline-primary" href="{{route('admin.event.add-pictures', ['event' => $model])}}"
            >@include('inc.icon', ['icon' => 'picture']) Bilder aus Mediathek hinzufügen</a>
            <a class="btn btn-outline-primary" href="{{route('admin.event.upload-pictures', ['event' => $model])}}"
            >@include('inc.icon', ['icon' => 'upload']) Neue Bilder hochladen</a>
        </div>
    </h4>
    @if(isset($model))
        <form method="POST">
            @csrf
            <div class="row" ic-target="closest .col">
                @foreach($model->pictures as $picture)
                    <div class="col col-lg-2 col-md-4 col-sm-6 mb-3 position-relative">
                        <button
                            ic-delete-from="{{route('admin.event.remove-picture', ['event' => $model, 'picture' => $picture])}}"
                            class="btn btn-sm btn-danger" style="position:absolute;top:0;right:15px;"
                        >
                            @include('inc.icon', ['icon' => 'delete'])
                        </button>
                        @include('inc.picture', ['image' => $picture])
                    </div>
                @endforeach
            </div>
        </form>
    @endif
</div>

