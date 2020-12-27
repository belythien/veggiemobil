@if(isset($class, $model))
    @extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ route('admin.' . $class . '.update', [$class => $model]) }}">
                    @csrf
                    @method('PUT')
                    @component('component.admin-card-header', ['class' => $class])
                        {{config('label')[$class]}} bearbeiten
                    @endcomponent

                    <div class="card-body">
                        <div class="row">
                            @include('admin.' . $class . '.form')
                        </div>
                    </div>
                    @include('inc.admin-card-footer')
                </form>
            </div>
        </div>
    </div>
@endsection

@endif
