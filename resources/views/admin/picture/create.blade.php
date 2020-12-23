@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.picture.store') }}" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header"><i class="fa fa-plus-circle"></i> {{ __('Bild anlegen') }}</div>

                    <div class="card-body">
                        @csrf
                        <div class="row">
                            @include('admin.picture.form')
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Speichern</button>
                        <a class="btn btn-outline-success" href="{{route('admin.picture.index')}}"><i
                                class="fa fa-times-circle"
                            ></i> Abbrechen</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
