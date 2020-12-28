<?php

namespace App\Http\Controllers;

use App\Event;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class PageController extends Controller {

    public function __construct() {
        // Middleware only applied to these methods
        $this->middleware( 'auth' )->except( [
            'show',
            'display'
        ] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pages = Page::paginate( 20 );
        return view( 'admin.page.index', [ 'models' => $pages, 'class' => 'page' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'page' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $page = Page::createPage( $request );
        return redirect( route( 'page.show', [ 'page' => $page ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show( Page $page ) {
        return redirect( route( 'page.display', [ 'slug' => $page->slug, 'class' => 'page' ] ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit( Page $page ) {
        return view( 'admin.edit', [ 'model' => $page, 'class' => 'page' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Page $page ) {
        $page->updatePage( $request );
        return redirect( route( 'admin.page.show', [ 'page' => $page ] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy( Page $page ) {
        $name = $page->title;
        $page->delete();
        return redirect()->back()->with( 'success', 'Seite <strong>' . $name . '</strong> gelöscht' );
    }

    public function display( $slug ) {
        $page = Page::where( 'slug', $slug )->first();
        if( !empty( $page ) ) {
            if( !empty( $page->external_url ) ) {
                return redirect( url( $page->external_url ) );
            }

            if( $page->id == 3 ) { // EVENTS
                $events = Event::orderby( 'date_from', 'desc' )->paginate( 20 );
                return view( $page->template, [ 'page' => $page, 'events' => $events ] );
            }

            return view( $page->template, [ 'page' => $page ] );
        }
        return view( '404' );
    }
}
