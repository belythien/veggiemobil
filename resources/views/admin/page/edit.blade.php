@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-green"><i class="fa fa-edit"></i> {{ __('Seite bearbeiten') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.page.update', ['page' => $model]) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            @include('admin.page.form')
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Speichern</button>
                    <a class="btn btn-outline-success" href="{{route('admin.page.index')}}"><i class="fa fa-times-circle"></i> Abbrechen</a>
                </div>
            </div>
        </div>
    </div>
@endsection
