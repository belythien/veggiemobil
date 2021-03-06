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
                                <th>Inhalt</th>
                                <th class="text-center">Live</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody ic-target="closest tr">
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->slug}}</td>
                                    <td style="max-width: 200px">
                                        <a class="font-weight-bold"
                                           href="{{route('admin.' . $class . '.edit', [$class => $model])}}"
                                        >{{$model->title}}</a>
                                        <div>{!! $model->getTextPreview(150) !!}</div>
                                        @if(!empty($model->external_url))
                                            <div class="text-sm">
                                                <a class="text-secondary" href="{{$model->external_url}}" target="_blank">@include('inc.icon', ['icon' => 'external']) {{$model->external_url}}</a>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @include('inc.boolean', [
                                                        'value' => $model->live,
                                                        'icPostTo' => route('admin.page.toggle-live', ['page' => $model])
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
