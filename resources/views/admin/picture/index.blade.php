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
                                <th>Bild</th>
                                <th>Slug</th>
                                <th>Titel</th>
                                <th></th>
                                <th class="text-center">Live</th>
                                <th class="text-center">Willkommen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td style="max-width: 200px">
                                        <a href="{{route('picture.show', ['picture' => $model])}}">@include('inc.picture', ['image' => $model])</a>
                                    </td>
                                    <td>{{$model->slug}}</td>
                                    <td>
                                        <div class="font-weight-bold">{{$model->title}}</div>
                                        <div>{{$model->text}}</div>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->dishes as $dish)
                                                <li>
                                                    <a href="{{route('admin.dish.edit', ['dish' => $dish])}}">{{$dish->title}}</a>
                                                </li>
                                            @endforeach
                                            @foreach($model->events as $event)
                                                <li>
                                                    <a href="{{route('admin.event.edit', ['event' => $event])}}">{{$event->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        @include('inc.boolean', [
                                                        'value' => $model->live,
                                                        'icPostTo' => route('admin.picture.toggle-live', ['picture' => $model])
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('inc.boolean', [
                                                        'value' => $model->welcome,
                                                        'icPostTo' => route('admin.picture.toggle-welcome', ['picture' => $model])
                                        ])
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
                @endcomponent
            </div>
        </div>
    </div>
@endsection
