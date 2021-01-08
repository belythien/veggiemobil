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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ) {
        $orderby = $request->has( 'orderby' ) ? $request->get( 'orderby' ) : 'title';
        $dir = $request->has( 'dir' ) ? $request->get( 'dir' ) : 'asc';

        $id = $request->has( 'id' ) ? $request->get( 'id' ) : null;
        $title = $request->has( 'title' ) ? $request->get( 'title' ) : null;
        $live = $request->has( 'live' ) ? $request->get( 'live' ) : null;
        $welcome = $request->has( 'welcome' ) ? $request->get( 'welcome' ) : null;
        $picturable = $request->has( 'picturable' ) ? $request->get( 'picturable' ) : null;

        $pictures = Picture::when( !empty( $title ), function ( $query ) use ( $title ) {
            return $query->where( 'pictures.title', 'LIKE', '%' . $title . '%' );

        } )->when( !empty( $id ), function ( $query ) use ( $id ) {
            return $query->where( 'pictures.id', $id );

        } )->when( !empty( $picturable ) && $picturable != 'any', function ( $query ) use ( $picturable ) {
            $tmp = explode( '_', $picturable );
            return $query->join( 'picturables', 'picturables.picture_id', '=', 'pictures.id' )
                ->where( 'picturable_type', $tmp[ 0 ] )
                ->where( 'picturable_id', $tmp[ 1 ] );

        } )->when( !empty( $live ) && $live != 'any', function ( $query ) use ( $live ) {
            return $query->when( $live == 'yes', function ( $query ) {
                return $query->where( 'pictures.live', 1 );
            } )->when( $live == 'no', function ( $query ) {
                return $query->where( 'pictures.live', 0 );
            } );

        } )->when( !empty( $welcome ) && $welcome != 'any', function ( $query ) use ( $welcome ) {
            return $query->when( $welcome == 'yes', function ( $query ) {
                return $query->where( 'pictures.welcome', 1 );
            } )->when( $welcome == 'no', function ( $query ) {
                return $query->where( 'pictures.welcome', 0 );
            } );

        } )->orderby( 'pictures.created_at', 'desc' )
            ->orderby( 'pictures.title' )
            ->select( 'pictures.*' )
            ->paginate( 20 );

        return view( 'admin.picture.index', [
            'models'  => $pictures,
            'class'   => 'picture',
            'orderby' => $orderby,
            'filter'  => [
                'id'         => $id,
                'title'      => $title,
                'live'       => $live,
                'welcome'    => $welcome,
                'picturable' => $picturable
            ],
            'dir'     => $dir
        ] );
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
