@if(isset($model) && $model->pictures()->count() > 0)
    <div class="col-9">
        <div class="row">
            @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
            @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text', 'readonly' => true ])

            @include('admin.form.col', ['field' => 'filename',     'size' => 8, 'type' => 'file'  ])
            @include('admin.form.col', ['field' => 'live',         'size' => 4, 'type' => 'radio' ])

            @include('admin.form.col', ['field' => 'text',        'size' => 12, 'type' => 'textarea' ])
        </div>
    </div>
    <div class="col-lg-3">
        @include('inc.picture', ['image' => $model->pictures()->first()])
    </div>
@else
    @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
    @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text', 'readonly' => true ])

    @include('admin.form.col', ['field' => 'filename',     'size' => 8, 'type' => 'file'  ])
    @include('admin.form.col', ['field' => 'live',         'size' => 4, 'type' => 'radio' ])

    @include('admin.form.col', ['field' => 'text',        'size' => 12, 'type' => 'textarea' ])
@endif

@include('admin.form.col', ['field' => 'dips',        'size' => 12, 'type' => 'checkbox', 'data' => \App\Dip::all(),      'colSize' => 3 ])
@include('admin.form.col', ['field' => 'allergens',   'size' => 12, 'type' => 'checkbox', 'data' => \App\Allergen::all(), 'colSize' => 3 ])
@include('admin.form.col', ['field' => 'categories',  'size' => 12, 'type' => 'checkbox', 'data' => \App\Category::all(), 'colSize' => 3 ])
