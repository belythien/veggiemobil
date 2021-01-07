<?php

namespace App;

use App\Traits\MyConfig;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model {

    use Sluggable;

    protected $fillable = [ 'title', 'text', 'live', 'publication', 'expiration' ];
    protected $dates    = [ 'publication', 'expiration' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->title;
    }

    /* === RELATIONS === */

    public function allergens() {
        return $this->belongsToMany( 'App\Allergen' );
    }

    public function categories() {
        return $this->morphToMany( Category::class, 'categorizable' );
    }

    public function dips() {
        return $this->belongsToMany( 'App\Dip' );
    }

    public function pictures() {
        return $this->morphToMany( Picture::class, 'picturable' );
    }

    /* === CRUD === */

    public static function createDish( $request ) {
        $dish = new Dish();
        $dish->fill( $request->input() );
        $dish->save();
        $dish->allergens()->sync( $request->get( 'allergens' ) );
        $dish->dips()->sync( $request->get( 'dips' ) );
        $dish->categories()->sync( $request->get( 'categories' ) );

        if( $request->has( 'filename' ) ) {
            $picture = Picture::createPicture( $request );
            $dish->pictures()->save( $picture );
        }

        return $dish;
    }

    public function updateDish( $request ) {
        $this->fill( $request->input() );
        $this->save();
        $this->allergens()->sync( $request->get( 'allergens' ) );
        $this->dips()->sync( $request->get( 'dips' ) );
        $this->categories()->sync( $request->get( 'categories' ) );

        if( $request->has( 'filename' ) ) {
            $picture = Picture::createPicture( $request );
            $this->pictures()->delete();
            $this->pictures()->save( $picture );
        }
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
