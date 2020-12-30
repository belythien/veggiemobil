<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $fillable = [ 'label' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->label;
    }

    public static function getPagesByMenuLabel( $label ) {
        return Menu::where( 'label', $label )->first()->pages()->live()->get();
    }

    /* === RELATIONS === */

    public function pages() {
        return $this->belongsToMany( 'App\Page' )->withPivot( 'sort' )->orderBy( 'sort' );
    }

    /* === CRUD === */

    public static function createMenu( $request ) {
        $menu = new Menu();
        $menu->fill( $request->input() );
        $menu->save();
        $menu->pages()->sync( $request->get( 'pages' ) );
        return $menu;
    }

    public function updateMenu( $request ) {
        $this->fill( $request->input() );
        $this->save();
        $this->pages()->sync( $request->get( 'pages' ) );
    }

    public function pageMoveUp( Page $page ) {
        $old_sort = $this->pages()->where( 'page_id', $page->id )->first()->pivot->sort;
        $this->pages()->updateExistingPivot( $page, [ 'sort' => $old_sort - 15 ], true );
        $this->updatePageSort();
    }

    public function pageMoveDown( Page $page ) {
        $old_sort = $this->pages()->where( 'page_id', $page->id )->first()->pivot->sort;
        $this->pages()->updateExistingPivot( $page, [ 'sort' => $old_sort + 15 ], true );
        $this->updatePageSort();
    }

    public function updatePageSort() {
        $cnt = 10;
        foreach( $this->pages as $page ) {
            $this->pages()->updateExistingPivot( $page, [ 'sort' => $cnt ], false );
            $cnt = $cnt + 10;
        }
    }
}
