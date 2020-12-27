<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;

class DishController extends Controller {

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
        $dishes = Dish::paginate( 20 );
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
    public function store( Request $request ) {
        $dish = Dish::createDish( $request );
        return redirect( route( 'dish.show', [ 'dish' => $dish ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function show( Dish $dish ) {
        return view( 'dish', [ 'dish' => $dish, 'class' => 'dish' ] );
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
    public function update( Request $request, Dish $dish ) {
        $dish->updateDish( $request );
        return redirect( route( 'dish.show', [ 'dish' => $dish ] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy( Dish $dish ) {
        $name = $dish->title;
        $dish->delete();
        return redirect()->back()->with( 'success', 'Seite <strong>' . $name . '</strong> gelöscht' );
    }
}
