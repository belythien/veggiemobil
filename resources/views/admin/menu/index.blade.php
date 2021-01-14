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
                                <th>Label</th>
                                <th>Seiten</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody ic-target="closest tr">
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>
                                        <a href="{{route('admin.menu.edit', ['menu' => $model])}}">{{$model->label}}</a>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" id="menu_pages_{{$model->id}}">
                                            @include('admin.menu.pages', ['menu' => $model])
                                        </ul>
                                    </td>
                                    <td class="text-right">
                                        @include('admin.index-buttons', ['model' => $model])
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
