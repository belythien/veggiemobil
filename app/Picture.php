<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    use Sluggable;

    protected $fillable = [ 'slug', 'title', 'text', 'live', 'welcome', 'filename', 'width', 'height' ];

    /* === SCOPE === */

    public function scopeWelcome( $query ) {
        return $query->where( 'welcome', 1 );
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
