<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $fillable = [ 'label' ];

    /* === RELATIONS === */

    public function pages() {
        return $this->belongsToMany( 'App\Page' );
    }

    /* === CRUD === */

    public static function createMenu( $request ) {
        $menu = new Menu();
        $menu->fill( $request->input() );
        $menu->save();
        return $menu;
    }

    public function updateMenu( $request ) {
        $this->fill( $request->input() );
        $this->save();
    }
}
