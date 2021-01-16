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
                                <th>@include('inc.sort-link', ['field' => 'sort'])</th>
                                <th class="text-center">@include('inc.sort-link', ['field' => 'live'])</th>
                                <th>{{__('field.dishes')}}</th>
                                <th></th>
                            </tr>
                            <tr class="filter">
                                <form action="{{route('admin.category.filter')}}" method="POST">
                                    @csrf
                                    <th>@include('inc.filter', ['field' => 'id',   'type' => 'number'])</th>
                                    <th>@include('inc.filter', ['field' => 'title'                   ])</th>
                                    <th style="width:80px">@include('inc.filter', ['field' => 'sort', 'type' => 'number'])</th>
                                    <th style="width:80px">@include('inc.filter', ['field' => 'live', 'type' => 'select'])</th>
                                    <th>@include('inc.filter', ['field' => 'dish_id', 'type' => 'select', 'data' => \App\Dish::getDataForDropdownlist()])</th>
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
                                    <td style="max-width: 200px;">
                                        <a href="{{route('admin.category.edit', ['category' => $model])}}">{{$model->title}}</a>
                                        <div class="text-sm">
                                            {!! $model->text !!}
                                        </div>
                                    </td>
                                    <td class="text-center">{{$model->sort}}</td>
                                    <td class="text-center">
                                        @include('inc.boolean', [
                                                        'value' => $model->live,
                                                        'icPostTo' => route('admin.category.toggle-live', ['category' => $model])
                                        ])
                                    </td>
                                    <td>
                                        <ul class="list-unstyled" id="category_dishes_{{$model->id}}">
                                            @include('admin.category.dishes', ['category' => $model])
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
