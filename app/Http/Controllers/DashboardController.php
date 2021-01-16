<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Event;
use App\Page;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        $pages = Page::orderby('created_at', 'desc')->orderby( 'title' )->get();
        $dishes = Dish::orderby('created_at', 'desc')->orderby( 'title' )->get();
        $events = Event::orderby('date_from', 'desc')->orderby( 'title' )->get();
        return view( 'admin.dashboard', [
            'pages'  => $pages,
            'dishes' => $dishes,
            'events' => $events
        ] );
    }

}
