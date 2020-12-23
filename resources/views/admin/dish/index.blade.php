@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Gerichte') }}
                    <div class="float-right">
                        <a class="btn btn-sm btn-success" href="{{route('admin.dish.create')}}"><i
                                class="fa fa-plus-circle fa-fw"
                            ></i> {{__('Neues Gericht')}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Slug</th>
                                <th>Inhalt</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->slug}}</td>
                                    <td>
                                        <a class="font-weight-bold"
                                           href="{{route('admin.dish.edit', ['dish' => $model])}}"
                                        >{{$model->title}}</a>
                                        <div>{!! $model->text !!}</div>
                                    </td>
                                    <td>
                                        @foreach($model->pictures as $picture)
                                            <img src="{{url('/img/' . $picture->filename)}}" class="img-thumbnail" width="300" alt="">
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{route('admin.dish.edit', ['dish' => $model])}}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
