@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @component('component.index', ['class' => $class, 'models' => $models])
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Slug</th>
                                <th>Text</th>
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
                                           href="{{route('admin.'. $class . '.edit', [$class => $model])}}"
                                        >{{$model->title}}</a>
                                        <div>{!! $model->text !!}</div>
                                    </td>
                                    <td style="max-width: 200px">
                                        @foreach($model->pictures as $picture)
                                            @include('inc.picture', ['image' => $picture])
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{route('admin.'. $class . '.edit', [$class => $model])}}"
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
                @endcomponent
            </div>
        </div>
    </div>
@endsection
