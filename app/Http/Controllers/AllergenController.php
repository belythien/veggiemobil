<?php

namespace App\Http\Controllers;

use App\Allergen;
use Illuminate\Http\Request;

class AllergenController extends Controller {

    public function __construct() {
        // Middleware only applied to these methods
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $allergens = Allergen::paginate( 20 );
        return view( 'admin.allergen.index', [ 'models' => $allergens, 'class' => 'allergen' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', ['class' => 'allergen'] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $allergen = Allergen::createAllergen( $request );
        return redirect( route( 'allergen.show', [ 'allergen' => $allergen ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Allergen $allergen
     * @return \Illuminate\Http\Response
     */
    public function show( Allergen $allergen ) {
        return view( 'allergen', [ 'allergen' => $allergen, 'class' => 'allergen' ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Allergen $allergen
     * @return \Illuminate\Http\Response
     */
    public function edit( Allergen $allergen ) {
        return view( 'admin.edit', [ 'model' => $allergen, 'class' => 'allergen' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Allergen $allergen
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Allergen $allergen ) {
        $allergen->updateAllergen( $request );
        return redirect( route( 'allergen.show', [ 'allergen' => $allergen ] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Allergen $allergen
     * @return \Illuminate\Http\Response
     */
    public function destroy( Allergen $allergen ) {
        $name = $allergen->title;
        $allergen->delete();
        return redirect()->back()->with( 'success', 'Allergen <strong>' . $name . '</strong> gelöscht' );
    }
}
