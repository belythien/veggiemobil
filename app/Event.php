<?php

namespace App;

use App\Traits\MyConfig;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    use Sluggable;

    protected $fillable = [ 'title', 'text', 'live', 'date_from', 'date_to', 'external_url' ];
    protected $dates    = [ 'date_from', 'date_to' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->title;
    }

    public function getDateAttribute() {
        if( !empty( $this->date_from ) ) {
            if( !empty( $this->date_to ) ) {
//            if( $this->date_to->year() == $this->date_from->year() ) {
                return $this->date_from->format( 'd.m.' ) . ' - ' . $this->date_to->format( 'd.m.Y' );
//            }
            }
            return $this->date_from->format( 'd.m.Y' );
        }
        return null;
    }

    public static function getNextEvents( $limit = 2 ) {
        return Event::live()->where( 'date_from', '>', date( 'Y-m-d' ) )->limit( $limit )->orderby( 'date_from', 'asc' )->get();
    }

    public function getTextPreview( $limit ) {
        $search = array(
            '@<script[^>]*?>.*?</script>@si',  // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including     CDATA );
        );
        $plain_text = $this->text;
        $plain_text = preg_replace( $search, ' ', $plain_text );
        if( strlen( $plain_text ) > $limit ) {
            $plain_text = substr( $plain_text, 0, $limit ) . '...';
        }
        $plain_text = nl2br( $plain_text );
        return $plain_text;
    }

    /* === SCOPE === */

    public function scopeLive( $query ) {
        return $query->where( 'live', 1 );
    }

    /* === RELATIONS === */

    public function pictures() {
        return $this->morphToMany( Picture::class, 'picturable' );
    }

    /* === METHODS === */

    public function getNotLinkedPicturesAttribute() {
        return Picture::all()->diff( $this->pictures );
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
