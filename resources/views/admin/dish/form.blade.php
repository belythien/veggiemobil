@include('admin.form.col', ['field' => 'title',        'size' => 8,  'type' => 'text' ])
@include('admin.form.col', ['field' => 'slug',         'size' => 4,  'type' => 'text' ])

@include('admin.form.col', ['field' => 'live',        'size' => 4,  'type' => 'radio' ])
@include('admin.form.col', ['field' => 'publication', 'size' => 4,  'type' => 'date' ])
@include('admin.form.col', ['field' => 'expiration',  'size' => 4,  'type' => 'date' ])

@include('admin.form.col', ['field' => 'text',        'size' => 12, 'type' => 'textarea' ])

@include('admin.form.col', ['field' => 'allergens',   'size' => 12, 'type' => 'checkbox', 'data' => \App\Allergen::all() ])
