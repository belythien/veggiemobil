@if(isset($model) && $model->pictures()->count() > 0)
    <div class="col-9">
        <div class="row">
            @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
            @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])

            @include('admin.form.col', ['field' => 'filename',     'size' => 12, 'type' => 'file' ])

            @include('admin.form.col', ['field' => 'live',        'size' => 4,  'type' => 'radio' ])
            @include('admin.form.col', ['field' => 'publication', 'size' => 4,  'type' => 'date' ])
            @include('admin.form.col', ['field' => 'expiration',  'size' => 4,  'type' => 'date' ])
        </div>
    </div>
    <div class="col-lg-3">
        @include('inc.picture', ['image' => $model->pictures()->first()])
    </div>
@else
    @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
    @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])

    @include('admin.form.col', ['field' => 'filename',     'size' => 12, 'type' => 'file' ])

    @include('admin.form.col', ['field' => 'live',        'size' => 4,  'type' => 'radio' ])
    @include('admin.form.col', ['field' => 'publication', 'size' => 4,  'type' => 'date' ])
    @include('admin.form.col', ['field' => 'expiration',  'size' => 4,  'type' => 'date' ])

@endif

@include('admin.form.col', ['field' => 'text',        'size' => 12, 'type' => 'textarea' ])

@include('admin.form.col', ['field' => 'dips',        'size' => 12, 'type' => 'checkbox', 'data' => \App\Dip::all() ])
@include('admin.form.col', ['field' => 'allergens',   'size' => 12, 'type' => 'checkbox', 'data' => \App\Allergen::all() ])
@include('admin.form.col', ['field' => 'pages',       'size' => 12, 'type' => 'checkbox', 'data' => \App\Page::all() ])
