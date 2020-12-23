<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model {

    use Sluggable;

    protected $fillable = [ 'slug', 'title', 'text', 'live', 'publication', 'expiration' ];
    protected $dates    = [ 'publication', 'expiration' ];

    /* === RELATIONS === */

    public function dishes() {
        return $this->belongsToMany( 'App\Dish' );
    }

    /* === ATTRIBUTES === */

    public function getTemplateAttribute() {
        if( !empty( $this->attributes[ 'template' ] ) && View::exists( 'template.' . $this->attributes[ 'template' ] ) ) {
            return 'template.' . $this->attributes[ 'template' ];
        }
        return 'page';
    }

    /* === CRUD === */

    public static function createPage( $request ) {
        $page = new Page();
        $page->fill( $request->input() );
        $page->save();
        return $page;
    }

    public function updatePage( $request ) {
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
