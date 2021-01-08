@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @component('component.index', ['class' => $class, 'models' => $models])
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="table-header">
                                <th>@include('inc.sort-link', ['field' => 'id'])</th>
                                <th>@include('inc.sort-link', ['field' => 'title'])</th>
                                <th class="text-center">@include('inc.sort-link', ['field' => 'live'])</th>
                                <th>@include('inc.sort-link', ['field' => 'categories'])</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="filter">
                                <form action="{{route('admin.dish.filter')}}" method="POST">
                                    @csrf
                                    <th>@include('inc.filter', ['field' => 'id',   'type' => 'number'])</th>
                                    <th>@include('inc.filter', ['field' => 'title'                   ])</th>
                                    <th style="width:80px">@include('inc.filter', ['field' => 'live', 'type' => 'select'])</th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        @include('inc.filter-buttons', ['class' => $class])
                                    </th>
                                </form>
                            </tr>
                        </thead>
                        <tbody ic-target="closest tr">
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>
                                        <a class="font-weight-bold"
                                           href="{{route('admin.'. $class . '.edit', [$class => $model])}}"
                                        >{{$model->title}}
                                            @include('inc.sup-allergens', ['obj' => $model])
                                        </a>
                                        <div class="text-sm">{!! $model->text !!}</div>
                                        <ul class="separated-list text-sm">
                                            @foreach($model->dips as $dip)
                                                <li>{{$dip->title}}@include('inc.sup-allergens', ['obj' => $dip])</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        @include('inc.boolean', [
                                                        'value' => $model->live,
                                                        'icPostTo' => route('admin.dish.toggle-live', ['dish' => $model])
                                        ])
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->categories as $category)
                                                <li>
                                                    <a href="{{route('admin.category.edit', ['category' => $category])}}">{{$category->gui_name}}</a>
                                                </li>
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
