<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishFormRequest;
use Illuminate\Http\Request;

class DishController extends Controller {

    public function __construct() {
        // Middleware only applied to these methods
        $this->middleware( 'auth' )->except( [
            'display',
            'show',
        ] );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ) {
        $orderby = $request->has( 'orderby' ) ? $request->get( 'orderby' ) : 'title';
        $dishes = Dish::orderby( 'dishes.' . $orderby )->paginate( 20 );
        return view( 'admin.dish.index', [ 'models' => $dishes, 'class' => 'dish' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'dish' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( DishFormRequest $request ) {
        $dish = Dish::createDish( $request );
        return redirect( route( 'admin.dish.index', [ 'dish' => $dish ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function show( Dish $dish ) {
//        return view( 'dish', [ 'dish' => $dish, 'class' => 'dish' ] );
        return redirect( route( 'dish.display', [ 'slug' => $dish->slug, 'class' => 'dish' ] ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function edit( Dish $dish ) {
        return view( 'admin.edit', [ 'model' => $dish, 'class' => 'dish' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update( DishFormRequest $request, Dish $dish ) {
        $dish->updateDish( $request );
        return redirect( route( 'admin.dish.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy( Dish $dish ) {
        $dish->delete();
        return \response( "" )->header( 'X-IC-Remove', '1s' );
    }

    public function display( $slug ) {
        $dish = Dish::where( 'slug', $slug )->first();
        if( !empty( $dish ) ) {
            return view( 'dish', [ 'dish' => $dish ] );
        }
        return view( '404' );
    }
}
