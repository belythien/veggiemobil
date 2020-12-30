<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Dip extends Model {

    use Sluggable;

    protected $fillable = [ 'title' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->title;
    }

    /* === RELATIONS === */

    public function allergens() {
        return $this->belongsToMany( 'App\Allergen' );
    }

    /* === CRUD === */

    public static function createDip( $request ) {
        $dip = new Dip();
        $dip->fill( $request->input() );
        $dip->save();
        $dip->allergens()->sync( $request->get( 'allergens' ) );
        return $dip;
    }

    public function updateDip( $request ) {
        $this->fill( $request->input() );
        $this->save();
        $this->allergens()->sync( $request->get( 'allergens' ) );
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
