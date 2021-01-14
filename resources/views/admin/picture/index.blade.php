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
                                <th>Bild</th>
                                <th>@include('inc.sort-link', ['field' => 'title'])</th>
                                <th>@include('inc.sort-link', ['field' => 'picturable'])</th>
                                <th class="text-center">@include('inc.sort-link', ['field' => 'live'])</th>
                                <th class="text-center">@include('inc.sort-link', ['field' => 'welcome'])</th>
                                <th></th>
                            </tr>
                            <tr class="filter">
                                <form action="{{route('admin.picture.filter')}}" method="POST">
                                    @csrf
                                    <th>@include('inc.filter', ['field' => 'id',   'type' => 'number'])</th>
                                    <th></th>
                                    <th>@include('inc.filter', ['field' => 'title',      'type' => 'text'])</th>
                                    <th>@include('inc.filter', ['field' => 'picturable', 'type' => 'select', 'data' => \App\Picture::getPicturablesForDropdownlist()])</th>
                                    <th>@include('inc.filter', ['field' => 'live',       'type' => 'select'])</th>
                                    <th>@include('inc.filter', ['field' => 'welcome',    'type' => 'select'])</th>
                                    <th>
                                        @include('inc.filter-buttons', ['class' => $class])
                                    </th>
                                </form>
                        </thead>
                        <tbody ic-target="closest tr">
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td style="max-width: 200px">
                                        <a href="{{route('admin.picture.edit', ['picture' => $model])}}">@include('inc.picture', ['image' => $model])</a>
                                    </td>
                                    <td>
                                        <div class="font-weight-bold">
                                            <a href="{{route('admin.picture.edit', ['picture' => $model])}}">{{$model->title}}</a>
                                        </div>
                                        <div>{{$model->text}}</div>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->pages as $page)
                                                <li>
                                                    @include('inc.icon', ['icon' => 'page'])
                                                    <a class="text-secondary" href="{{route('page.display', ['slug' => $page->slug])}}">{{$page->title}}</a>
                                                </li>
                                            @endforeach
                                            @foreach($model->dishes as $dish)
                                                <li>
                                                    @include('inc.icon', ['icon' => 'dish'])
                                                    <a class="text-secondary" href="{{route('dish.display', ['slug' => $dish->slug])}}">{{$dish->title}}</a>
                                                </li>
                                            @endforeach
                                            @foreach($model->events as $event)
                                                <li>
                                                    @include('inc.icon', ['icon' => 'event'])
                                                    <a class="text-secondary" href="{{route('event.display', ['slug' => $event->slug])}}">{{$event->title}}</a>
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
