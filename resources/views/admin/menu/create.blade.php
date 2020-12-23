@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.menu.store') }}">
                <div class="card">
                    <div class="card-header"><i class="fa fa-plus-circle"></i> {{ __('Menü anlegen') }}</div>

                    <div class="card-body">
                        @csrf
                        <div class="row">
                            @include('admin.menu.form')
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Speichern</button>
                        <a class="btn btn-outline-success" href="{{route('admin.menu.index')}}"><i
                                class="fa fa-times-circle"
                            ></i> Abbrechen</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
