@include('admin.form.col', ['field' => 'title',       'size' => 9, 'type' => 'text' ])
@include('admin.form.col', ['field' => 'sort',        'size' => 3, 'type' => 'number' ])
@include('admin.form.col', ['field' => 'text',        'size' => 12, 'type' => 'textarea' ])
@include('admin.form.col', ['field' => 'dishes',      'size' => 12, 'type' => 'checkbox', 'data' => \App\Dish::orderby('title')->get(), 'colSize' => 6 ])

