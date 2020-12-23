<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function index() {
        $images = [ 'baklava.jpg', 'caprese.jpg', 'chili-cheeze-fries.jpg', 'erdbeer-prosecco-slush.jpg', 'flammkuchen.jpg', 'jack-teller.jpg', 'power-burger.jpg', 'power-wrap.jpg' ];
        $pages = \App\Menu::where( 'label', 'Welcome' )->first()->pages;
        return view( 'welcome', [ 'images' => $images, 'pages' => $pages ] );
    }

}
