<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        $pages = Page::all();
        return view( 'dashboard', [ 'pages' => $pages ] );
    }

}
