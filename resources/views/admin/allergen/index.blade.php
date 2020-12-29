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
                                <th>Name</th>
                                <th>Gerichte</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>
                                        <a href="{{route('admin.allergen.edit', ['allergen' => $model])}}">{{$model->name}}</a>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->dishes as $dish)
                                                <li>
                                                    {{$dish->title}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{route('admin.allergen.edit', ['allergen' => $model])}}"
                                               class="btn btn-sm btn-success"
                                            ><i class="fa fa-edit fa-fw"></i></a>
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>
                                            </button>
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
