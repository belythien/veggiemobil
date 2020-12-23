@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Bilder') }}
                    <div class="float-right">
                        <a class="btn btn-sm btn-success" href="{{route('admin.picture.create')}}"><i
                                class="fa fa-plus-circle fa-fw"
                            ></i> {{__('Neues Bild')}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        {{$models->links()}}
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bild</th>
                                <th>Slug</th>
                                <th>Titel</th>
                                <th class="text-center">Willkommen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td style="max-width: 200px">
                                        <img src="{{url('/img/' . $model->filename)}}" alt="" class="img-fluid">
                                    </td>
                                    <td>{{$model->slug}}</td>
                                    <td>
                                        <div class="font-weight-bold">{{$model->title}}</div>
                                        <div>{{$model->text}}</div>
                                    </td>
                                    <td class="text-center">
                                        @include('inc.gui-boolean', ['value' => $model->welcome])
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{route('admin.picture.edit', ['picture' => $model])}}"
                                               class="btn btn-sm btn-success"
                                            ><i
                                                    class="fa fa-edit fa-fw"
                                                ></i></a>
                                            <button class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash fa-fw"
                                                ></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{$models->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
