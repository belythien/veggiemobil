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
                                <th>Datum</th>
                                <th>Live</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody ic-target="closest tr">
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
                                    <td>
                                        {{$model->date}}
                                    </td>
                                    <td class="text-center">
                                        @include('inc.boolean', [
                                                        'value' => $model->live,
                                                        'icPostTo' => route('admin.event.toggle-live', ['event' => $model])
                                        ])
                                    </td>
                                    <td style="width: 200px">
                                        @include('inc.picture', ['image' => $model->pictures()->first()])
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
