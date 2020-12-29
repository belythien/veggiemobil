@if(isset($model))
    <div class="col-lg-8">
        <div class="row">
@endif
            @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
            @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])
            @include('admin.form.col', ['field' => 'text',         'size' => 12, 'type' => 'textarea' ])
            @include('admin.form.col', ['field' => 'live',         'size' => 4,  'type' => 'radio' ])
            @include('admin.form.col', ['field' => 'welcome',      'size' => 8,  'type' => 'radio' ])
@if(isset($model))
            @include('admin.form.col', ['field' => 'width',        'size' => 4,  'type' => 'number', 'readonly' => true ])
            @include('admin.form.col', ['field' => 'height',       'size' => 4,  'type' => 'number', 'readonly' => true ])
            @include('admin.form.col', ['field' => 'filesize',     'size' => 4,  'type' => 'number', 'readonly' => true ])
        </div>
    </div>
    <div class="col-lg-4">
        @include('inc.picture', ['image' => $model])
    </div>
@endif

@include('admin.form.col', ['field' => 'dishes',       'size' => 12, 'type' => 'checkbox', 'data' => \App\Dish::all(), 'colSize' => 'lg-4' ])
@include('admin.form.col', ['field' => 'events',       'size' => 12, 'type' => 'checkbox', 'data' => \App\Event::all(), 'colSize' => 'lg-4' ])
