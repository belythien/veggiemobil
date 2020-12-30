@if(isset($class))
    @extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ route('admin.' . $class . '.store') }}" enctype="multipart/form-data">
                    @csrf
                    @component('component.admin-card-header', ['class' => $class])
                        {{config('label')[$class]}} anlegen
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
