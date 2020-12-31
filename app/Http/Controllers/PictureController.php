<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureFormRequest;
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
        $pictures = Picture::orderby('created_at', 'desc')->orderby('title')->paginate( 20 );
        return view( 'admin.picture.index', [ 'models' => $pictures, 'class' => 'picture' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'picture' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( PictureFormRequest $request ) {
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
        return view( 'picture', [ 'picture' => $picture, 'class' => 'picture' ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function edit( Picture $picture ) {
        return view( 'admin.edit', [ 'model' => $picture, 'class' => 'picture' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function update( PictureFormRequest $request, Picture $picture ) {
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
        $picture->delete();
        $picture->deletePicture();
        return \response( "" )->header( 'X-IC-Remove', '1s' );
    }

    public function toggleLive( Picture $picture ) {
        $picture->live = !$picture->live;
        $picture->save();
        return view( 'inc.boolean', [
            'value'    => $picture->live,
            'icPostTo' => route( 'admin.picture.toggle-live', [ 'picture' => $picture ] )
        ] );
    }

    public function toggleWelcome( Picture $picture ) {
        $picture->welcome = !$picture->welcome;
        $picture->save();
        return view( 'inc.boolean', [
            'value'    => $picture->welcome,
            'icPostTo' => route( 'admin.picture.toggle-welcome', [ 'picture' => $picture ] )
        ] );
    }


}
