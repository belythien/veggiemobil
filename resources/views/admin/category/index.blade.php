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
                                <th>Titel</th>
                                <th class="text-center">Sort</th>
                                <th>Gerichte</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td style="max-width: 200px;">
                                        <a href="{{route('admin.category.edit', ['category' => $model])}}">{{$model->title}}</a>
                                        <div class="text-sm">
                                            {!! $model->text !!}
                                        </div>
                                    </td>
                                    <td class="text-center">{{$model->sort}}</td>
                                    <td>
                                        <ul class="list-unstyled" id="category_dishes_{{$model->id}}">
                                            @include('admin.category.dishes', ['category' => $model])
                                        </ul>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{route('admin.category.edit', ['category' => $model])}}"
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
