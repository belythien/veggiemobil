<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {

    public function __construct() {
        // Middleware only applied to these methods
        $this->middleware( 'auth' )->except( [
            'show',
        ] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $menus = Menu::paginate( 20 );
        return view( 'admin.menu.index', [ 'models' => $menus, 'class' => 'menu' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'menu' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $menu = Menu::createMenu( $request );
        return redirect( route( 'menu.show', [ 'menu' => $menu ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show( Menu $menu ) {
        return view( 'menu', [ 'menu' => $menu, 'class' => 'menu' ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit( Menu $menu ) {
        return view( 'admin.edit', [ 'model' => $menu, 'class' => 'menu' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Menu $menu ) {
        $menu->updateMenu( $request );
        return redirect( route( 'admin.menu.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy( Menu $menu ) {
        $name = $menu->title;
        $menu->delete();
        return redirect()->back()->with( 'success', 'Menü <strong>' . $name . '</strong> gelöscht' );
    }
}
