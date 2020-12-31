<?php

namespace App\Http\Controllers;

use App\Event;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller {

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
        $events = Event::orderby( 'date_from', 'desc' )->paginate( 20 );
        return view( 'admin.event.index', [ 'models' => $events, 'class' => 'event' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'event' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $event = Event::createEvent( $request );
        return redirect( route( 'event.show', [ 'event' => $event ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show( Event $event ) {
        return redirect( route( 'event.display', [ 'slug' => $event->slug, 'class' => 'event' ] ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit( Event $event ) {
        return view( 'admin.edit', [ 'model' => $event, 'class' => 'event' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Event $event ) {
        $event->updateEvent( $request );
        return redirect( route( 'event.show', [ 'event' => $event ] ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy( Event $event ) {
        $event->delete();
        return \response( "" )->header( 'X-IC-Remove', '1s' );
    }

    public function display( $slug ) {
        $event = Event::where( 'slug', $slug )->first();
        if( !empty( $event ) ) {
            return view( 'event', [ 'event' => $event ] );
        }
        return view( '404' );
    }

    public function toggleLive( Event $event ) {
        $event->live = !$event->live;
        $event->save();
        return view( 'inc.boolean', [
            'value'    => $event->live,
            'icPostTo' => route( 'admin.event.toggle-live', [ 'event' => $event ] )
        ] );
    }

    public function addPictures( Event $event ) {
        return view( 'admin.event.add-pictures', [ 'event' => $event, 'class' => 'event' ] );
    }

    public function linkPicture( Event $event, Picture $picture ) {
        $event->pictures()->attach( $picture );
        return view( 'admin.event.add-pictures-inc', [ 'event' => $event, 'class' => 'event' ] );
    }

    public function unlinkPicture( Event $event, Picture $picture ) {
        $event->pictures()->detach( $picture );
        return view( 'admin.event.add-pictures-inc', [ 'event' => $event, 'class' => 'event' ] );
    }

    public function uploadPictures( Event $event ) {
        return view( 'admin.event.upload-pictures', [ 'event' => $event, 'class' => 'event' ] );
    }

    public function storePictures( Request $request, Event $event ) {
        $pictures = Picture::createPictures( $request );
        foreach( $pictures as $picture ) {
            $event->pictures()->attach( $picture );
        }
        return redirect()->route( 'admin.event.edit', [ 'event' => $event, 'class' => 'event' ] )
            ->with( 'success', 'Bilder hochgeladen' );
    }

    public function removePicture( Event $event, Picture $picture ) {
        $event->pictures()->detach( $picture );
        return \response( "" )->header( 'X-IC-Remove', '1s' );
    }
}
