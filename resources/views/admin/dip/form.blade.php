@if(!isset($model))
    @include('admin.form.col', ['field' => 'title',        'size' => 12, 'type' => 'text' ])
@else
    @include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
    @include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])
@endif
@include('admin.form.col', ['field' => 'allergens',   'size' => 12, 'type' => 'checkbox', 'data' => \App\Allergen::all() ])
