<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model {

    use Sluggable;

    protected $fillable = [ 'slug', 'title', 'text', 'live', 'publication', 'expiration' ];
    protected $dates    = [ 'publication', 'expiration' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->title;
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
        return $query->where( 'pages.live', 1 );
    }

    /* === RELATIONS === */

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

    public function dishMoveUp( Dish $dish ) {
        $old_sort = $this->dishes()->where( 'dish_id', $dish->id )->first()->pivot->sort;
        $this->dishes()->updateExistingPivot( $dish, [ 'sort' => $old_sort - 15 ], true );
        $this->updateDishSort();
    }

    public function dishMoveDown( Dish $dish ) {
        $old_sort = $this->dishes()->where( 'dish_id', $dish->id )->first()->pivot->sort;
        $this->dishes()->updateExistingPivot( $dish, [ 'sort' => $old_sort + 15 ], true );
        $this->updateDishSort();
    }

    public function updateDishSort() {
        $cnt = 10;
        foreach( $this->dishes as $dish ) {
            $this->dishes()->updateExistingPivot( $dish, [ 'sort' => $cnt ], false );
            $cnt = $cnt + 10;
        }
    }
}
