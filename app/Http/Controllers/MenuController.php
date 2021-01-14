<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function index() {
        $menus = Menu::paginate( 20 );
        return view( 'admin.menu.index', [ 'models' => $menus, 'class' => 'menu' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'menu' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( Request $request ) {
        $menu = Menu::createMenu( $request );
        return redirect( route( 'menu.show', [ 'menu' => $menu ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param Menu $menu
     * @return Response
     */
    public function show( Menu $menu ) {
        return view( 'menu', [ 'menu' => $menu, 'class' => 'menu' ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return Response
     */
    public function edit( Menu $menu ) {
        return view( 'admin.edit', [ 'model' => $menu, 'class' => 'menu' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Menu $menu
     * @return Response
     */
    public function update( Request $request, Menu $menu ) {
        $menu->updateMenu( $request );
        return redirect( route( 'admin.menu.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return Response
     */
    public function destroy( Menu $menu ) {
        $menu->delete();
        return response( "" )->header( 'X-IC-Remove', '1s' );
    }

    public function pageMoveUp( Menu $menu, Page $page ) {
        $menu->pageMoveUp( $page );
        return view( 'admin.menu.pages', [ 'menu' => $menu ] );
    }

    public function pageMoveDown( Menu $menu, Page $page ) {
        $menu->pageMoveDown( $page );
        return view( 'admin.menu.pages', [ 'menu' => $menu ] );
    }
}
