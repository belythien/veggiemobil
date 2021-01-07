<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Event;
use App\Page;
use Illuminate\Http\Request;

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
        $page->delete();
        return \response( "" )->header( 'X-IC-Remove', '1s' );
    }

    public function display( $slug ) {
        $page = Page::where( 'slug', $slug )->first();
        if( !empty( $page ) ) {
            if( !empty( $page->external_url ) ) {
                return redirect( url( $page->external_url ) );
            }

            if( $page->slug == 'events' ) {
                $future_events = Event::live()->where( 'date_from', '>=', date( 'Y-m-d' ) )->orderby( 'date_from', 'asc' )->get();
                $past_events = Event::live()->where( 'date_from', '<', date( 'Y-m-d' ) )->orderby( 'date_from', 'desc' )->get();
                return view( $page->template, [ 'page' => $page, 'future_events' => $future_events, 'past_events' => $past_events ] );
            }

            return view( $page->template, [ 'page' => $page ] );
        }
        return view( '404' );
    }

    public function toggleLive( Page $page ) {
        $page->live = !$page->live;
        $page->save();
        return view( 'inc.boolean', [
            'value'    => $page->live,
            'icPostTo' => route( 'admin.page.toggle-live', [ 'page' => $page ] )
        ] );
    }

}
