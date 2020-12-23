@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Menüs') }}
                    <div class="float-right">
                        <a class="btn btn-sm btn-success" href="{{route('admin.menu.create')}}"><i
                                class="fa fa-plus-circle fa-fw"
                            ></i> {{__('Neues Menü')}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Label</th>
                                <th>Seiten</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model->id}}</td>
                                    <td>{{$model->label}}</td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($model->pages as $page)
                                                <li>
                                                    <a href="{{route('admin.page.edit', ['page' => $page])}}">{{$page->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{route('admin.menu.edit', ['menu' => $model])}}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
