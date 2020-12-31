@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{route('admin.event.upload-pictures', ['event' => $event])}}" method="POST"
                  enctype="multipart/form-data"
            >
                <div class="card">
                    <div class="card-header card-header-green">Bild-Upload</div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            @include('admin.form.col', ['field' => 'filenames[]',      'type' => 'file', 'multiple' => true, 'label' => 'Bilder (Mehrfachauswahl möglich)'     ])
                        </div>
                    </div>
                    @include('inc.admin-card-footer')
                </div>
            </form>
        </div>
    </div>
@endsection
