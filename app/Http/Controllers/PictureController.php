<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller {

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
        $pictures = Picture::paginate( 20 );
        return view( 'admin.picture.index', [ 'models' => $pictures ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.picture.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $picture = Picture::createPicture( $request );
        return redirect( route( 'picture.show', [ 'picture' => $picture ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function show( Picture $picture ) {
        return view( $picture->template, [ 'picture' => $picture ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function edit( Picture $picture ) {
        return view( 'admin.picture.edit', [ 'model' => $picture ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Picture $picture ) {
        $picture->updatePicture( $request );
        return redirect( route( 'picture.show', [ 'picture' => $picture ] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy( Picture $picture ) {
        $name = $picture->title;
        $picture->delete();
        return redirect()->back()->with( 'success', 'Bild <strong>' . $name . '</strong> gelöscht' );
    }
}
