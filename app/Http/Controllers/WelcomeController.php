<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function index() {
        $pages = Menu::getPagesByMenuLabel( 'Welcome' );
        return view( 'welcome', [ 'pages' => $pages ] );
    }

}
