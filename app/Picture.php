<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    use Sluggable;

    protected $fillable = [ 'slug', 'title', 'text', 'live', 'welcome', 'filename', 'width', 'height' ];

    /* === SCOPE === */

    public function scopeOnWelcomePage( $query ) {
        return $query->where( 'live', 1 )->where( 'welcome', 1 );
    }

    public function scopeLive( $query ) {
        return $query->where( 'live', 1 );
    }

    /* === RELATIONS === */

    public function dishes() {
        return $this->morphedByMany(Dish::class, 'picturable');
    }

    public function events() {
        return $this->morphedByMany( Event::class, 'picturable' );
    }

    /* === CRUD === */

    public static function createPicture( $request ) {
        $picture = new Picture();
        $picture->fill( $request->input() );
        $picture->save();
        return $picture;
    }

    public function updatePicture( $request ) {
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
