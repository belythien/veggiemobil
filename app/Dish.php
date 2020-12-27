<?php

namespace App;

use App\Traits\MyConfig;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model {

    use Sluggable;

    protected $fillable = [ 'title', 'text', 'live', 'publication', 'expiration' ];
    protected $dates    = [ 'publication', 'expiration' ];

    /* === RELATIONS === */

    public function pictures() {
        return $this->morphToMany( Picture::class, 'picturable' );
    }

    /* === CRUD === */

    public static function createDish( $request ) {
        $dish = new Dish();
        $dish->fill( $request->input() );
        $dish->save();
        return $dish;
    }

    public function updateDish( $request ) {
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
