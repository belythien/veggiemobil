<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model {

    protected $fillable = [ 'name' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->id . ') ' . $this->name;
    }

    /* === RELATIONS === */

    public function dishes() {
        return $this->belongsToMany( 'App\Dish' );
    }

    /* === CRUD === */

    public static function createAllergen( $request ) {
        $allergen = new Allergen();
        $allergen->fill( $request->input() );
        $allergen->save();
        return $allergen;
    }

    public function updateAllergen( $request ) {
        $this->fill( $request->input() );
        $this->save();
    }
}
