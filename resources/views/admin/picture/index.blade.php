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
                                <th>Bezogen auf</th>
                                <th class="text-center">Live</th>
                                <th class="text-center">Willkommen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody ic-target="closest tr">
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td style="max-width: 200px">
                                        <a href="{{route('admin.picture.edit', ['picture' => $model])}}">@include('inc.picture', ['image' => $model])</a>
                                    </td>
                                    <td>{{$model->slug}}</td>
                                    <td>
                                        <div class="font-weight-bold">
                                            <a href="{{route('admin.picture.edit', ['picture' => $model])}}">{{$model->title}}</a>
                                        </div>
                                        <div>{{$model->text}}</div>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->dishes as $dish)
                                                <li>
                                                    @include('inc.icon', ['icon' => 'dish'])
                                                    {{$dish->title}}
                                                </li>
                                            @endforeach
                                            @foreach($model->events as $event)
                                                <li>
                                                    @include('inc.icon', ['icon' => 'event'])
                                                    <a href="{{route('event.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
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
