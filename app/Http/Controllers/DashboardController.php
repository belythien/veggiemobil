<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Event;
use App\Page;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        $pages = Page::all();
        $dishes = Dish::all();
        $events = Event::all();
        return view( 'admin.dashboard', [
            'pages'  => $pages,
            'dishes' => $dishes,
            'events' => $events
        ] );
    }

}
