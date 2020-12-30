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
                        <tbody ic-target="closest tr">
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
                                                    @include('inc.icon', ['icon' => 'dish'])
                                                    {{$dish->title}}
                                                </li>
                                            @endforeach
                                            @foreach($model->dips as $dip)
                                                <li>
                                                    @include('inc.icon', ['icon' => 'dip'])
                                                    {{$dip->title}}
                                                </li>
                                            @endforeach
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
