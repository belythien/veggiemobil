<?php

use App\Dish;
use App\Event;
use App\Picture;
use Illuminate\Database\Seeder;

class _09_PicturableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        foreach( Dish::join( 'pictures', 'pictures.slug', '=', 'dishes.slug' )
                     ->selectRaw( 'pictures.id AS picture_id, dishes.id AS dish_id' )
                     ->get() as $picturable ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picturable->picture_id,
                'picturable_id'   => $picturable->dish_id,
                'picturable_type' => 'App\Dish',
            ] );
        }

        foreach( Event::join( 'pictures', 'pictures.slug', '=', 'events.slug' )
                     ->selectRaw( 'pictures.id AS picture_id, events.id AS event_id' )
                     ->get() as $picturable ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picturable->picture_id,
                'picturable_id'   => $picturable->event_id,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'aschersleben1.jpg',
            'aschersleben2.jpg',
            'aschersleben3.jpg',
            'aschersleben4.jpg',
            'aschersleben5.jpg',
            'aschersleben6.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 9,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'gardelegen2.jpg',
            'gardelegen3.jpg',
            'gardelegen5.jpg',
            'gardelegen6.jpg',
            'gardelegen7.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 8,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'hamburg1.jpg',
            'hamburg2.jpg',
            'hamburg3.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 3,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'hannover1.jpg',
            'hannover2.jpg',
            'hannover3.jpg',
            'hannover4.jpg',
            'hannover5.jpg',
            'hannover6.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 7,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'essen1.jpg',
            'essen3.jpg',
            'essen4.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 5,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'oestrichwinkel1-1.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 11,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'pullmancityharz.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 12,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'quedlinburg2.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 13,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'wiesbaden1.jpg',
            'wiesbaden2.jpg',
            'wiesbaden3.jpg',
            'wiesbaden4.jpg',
            'wiesbaden6.jpg',
            'wiesbaden10.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 4,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'oberhausen1.jpg',
            'oberhausen2.jpg',
            'oberhausen3.jpg',
            'oberhausen4.jpg',
            'oberhausen5.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 2,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'magdeburg1.jpg',
            'magdeburg2.jpg',
            'magdeburg3.jpg',
            'magdeburg4.jpg',
            'magdeburg5.jpg',
            'magdeburg6.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 10,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'mannheim1.jpg',
            'mannheim2.jpg',
            'mannheim3.jpg',
            'mannheim4.jpg',
            'mannheim5.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 6,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::whereIn( 'filename', [
            'darmstadt1.jpg',
            'darmstadt2.jpg',
            'darmstadt4-1.jpg',
            'darmstadt5-1.jpg',
            'darmstadt6-1.jpg',
            'darmstadt8-1.jpg',
            'darmstadt10-1.jpg',
            'darmstadt11-1.jpg',
            'darmstadt12-1.jpg',
            'darmstadt13-1.jpg',
            'darmstadt16-1.jpg',
            'darmstadt17-1.jpg',
            'darmstadt18-1.jpg',
            'darmstadt19-1.jpg',
            'darmstadt21-1.jpg',
            'darmstadt23-1.jpg',
            'darmstadt24-1.jpg',
            'darmstadt26-1.jpg',
            'darmstadt27-1.jpg',
            'darmstadt28-1.jpg',
            'darmstadt30-1.jpg',
            'darmstadt31-1.jpg',
            'darmstadt32-1.jpg',
        ] )->get() as $picture ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picture->id,
                'picturable_id'   => 1,
                'picturable_type' => 'App\Event',
            ] );
        }

        foreach( Picture::all() as $picture ) {
            if( $picture->dishes()->count() > 0 ) {
                $picture->title = $picture->dishes()->first()->title;
                $picture->save();
            }

            if( $picture->events()->count() > 0 ) {
                $picture->title = $picture->events()->first()->title;
                $picture->save();
            }
        }
    }
}
