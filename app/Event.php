<?php

namespace App;

use App\Traits\MyConfig;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    use Sluggable;

    protected $fillable = [ 'title', 'text', 'live', 'date_from', 'date_to', 'publication', 'expiration' ];
    protected $dates    = [ 'date_from', 'date_to', 'publication', 'expiration' ];

    /* === GUI === */

    public function getDateAttribute() {
        if( !empty( $this->date_to ) ) {
//            if( $this->date_to->year() == $this->date_from->year() ) {
                return $this->date_from->format( 'd.m.' ) . ' - ' . $this->date_to->format( 'd.m.Y' );
//            }
        }
        return $this->date_from->format( 'd.m.Y' );
    }

    /* === RELATIONS === */

    public function pictures() {
        return $this->morphToMany( Picture::class, 'picturable' );
    }

    /* === CRUD === */

    public static function createEvent( $request ) {
        $event = new Event();
        $event->fill( $request->input() );
        $event->save();
        return $event;
    }

    public function updateEvent( $request ) {
        $this->fill( $request->input() );
        $this->save();
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
