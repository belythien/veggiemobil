@include('admin.form.col', ['field' => 'label',       'size' => 12, 'type' => 'text' ])
@include('admin.form.col', ['field' => 'pages',       'size' => 12, 'type' => 'checkbox', 'data' => \App\Page::all() ])

