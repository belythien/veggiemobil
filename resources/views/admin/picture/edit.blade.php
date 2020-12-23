@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-edit"></i> {{ __('Bild bearbeiten') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.picture.update', ['picture' => $model]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            @include('admin.picture.form')
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Speichern</button>
                    <a class="btn btn-outline-success" href="{{route('admin.picture.index')}}"><i class="fa fa-times-circle"></i> Abbrechen</a>
                </div>
            </div>
        </div>
    </div>
@endsection
