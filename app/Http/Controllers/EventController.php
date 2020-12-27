<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller {

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
        $events = Event::orderby('date_from', 'desc')->paginate( 20 );
        return view( 'admin.event.index', [ 'models' => $events, 'class' => 'event' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.create', ['class' => 'event'] );
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
        return view( 'event', [ 'event' => $event, 'class' => 'event' ] );
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
        $name = $event->title;
        $event->delete();
        return redirect()->back()->with( 'success', 'Event <strong>' . $name . '</strong> gelöscht' );
    }
}
