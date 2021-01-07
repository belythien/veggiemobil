@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @component('component.index', ['class' => $class, 'models' => $models])
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th><a href="{{route('admin.dish.index', ['orderby' => 'id'])}}">ID</a></th>
                                <th><a href="{{route('admin.dish.index', ['orderby' => 'slug'])}}">Slug</a></th>
                                <th><a href="{{route('admin.dish.index', ['orderby' => 'title'])}}">Text</a></th>
                                <th>Kategorien</th>
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
                                        >{{$model->title}}
                                            @include('inc.sup-allergens', ['obj' => $model])
                                        </a>
                                        <div>{!! $model->text !!}</div>
                                        <ul class="separated-list">
                                            @foreach($model->dips as $dip)
                                                <li>{{$dip->title}}@include('inc.sup-allergens', ['obj' => $dip])</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->categories as $category)
                                                <li>{{$category->gui_name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td style="width: 200px">
                                        @foreach($model->pictures as $picture)
                                            @include('inc.picture', ['image' => $picture])
                                        @endforeach
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
