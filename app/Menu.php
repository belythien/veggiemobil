<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $fillable = [ 'label' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->label;
    }

    /* === RELATIONS === */

    public function pages() {
        return $this->belongsToMany( 'App\Page' );
    }

    /* === CRUD === */

    public static function createMenu( $request ) {
        $menu = new Menu();
        $menu->fill( $request->input() );
        $menu->pages()->sync( $request->get( 'pages' ) );
        $menu->save();
        return $menu;
    }

    public function updateMenu( $request ) {
        $this->fill( $request->input() );
        $this->pages()->sync( $request->get( 'pages' ) );
        $this->save();
    }
}
