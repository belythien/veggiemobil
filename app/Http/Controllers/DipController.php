<?php

namespace App\Http\Controllers;

use App\Dip;
use App\Http\Requests\DipFormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DipController extends Controller {

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
        $dips = Dip::paginate( 20 );
        return view( 'admin.dip.index', [ 'models' => $dips, 'class' => 'dip' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'dip' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( DipFormRequest $request ) {
        $dip = Dip::createDip( $request );
        return redirect( route( 'admin.dip.index', [ 'dip' => $dip ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Dip $dip
     * @return \Illuminate\Http\Response
     */
    public function show( Dip $dip ) {
        return view( 'dip', [ 'dip' => $dip, 'class' => 'dip' ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Dip $dip
     * @return \Illuminate\Http\Response
     */
    public function edit( Dip $dip ) {
        return view( 'admin.edit', [ 'model' => $dip, 'class' => 'dip' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Dip $dip
     * @return \Illuminate\Http\Response
     */
    public function update( DipFormRequest $request, Dip $dip ) {
        $dip->updateDip( $request );
        return redirect( route( 'admin.dip.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Dip $dip
     * @return \Illuminate\Http\Response
     */
    public function destroy( Dip $dip ) {
        $dip->delete();
        return \response( "" )->header( 'X-IC-Remove', '1s' );
    }
}
