@if(!isset($model))
    @include('admin.form.col', ['field' => 'title',        'size' => 12, 'type' => 'text' ])
@else
    @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
    @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])
@endif

@include('admin.form.col', ['field' => 'text',         'size' => 12, 'type' => 'textarea' ])

@include('admin.form.col', ['field' => 'live',         'size' => 4,  'type' => 'radio'    ])
@include('admin.form.col', ['field' => 'template',     'size' => 4,  'type' => 'select', 'data' => config('veggiemobil.page_templates')     ])
@include('admin.form.col', ['field' => 'external_url', 'size' => 4,  'type' => 'text'     ])
