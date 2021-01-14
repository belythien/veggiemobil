<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    use Sluggable;

    protected $fillable = [ 'title', 'text', 'live', 'sort' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->title;
    }

    public static function getDataForDropdownlist() {
        return Category::orderby( 'title' )->get()->pluck( 'title', 'id' );
    }

    /* === RELATIONS === */

    public function dishes() {
        return $this->morphedByMany( Dish::class, 'categorizable' )->withPivot( 'sort' )->orderBy( 'sort' );;
    }

    /* === CRUD === */

    public static function createCategory( $request ) {
        $category = new Category();
        $category->fill( $request->input() );
        $category->save();
        $category->dishes()->sync( $request->get( 'dishes' ) );
        self::updateCategorySort();
        return $category;
    }

    public function updateCategory( $request ) {
        $this->fill( $request->input() );
        $this->save();
        $this->dishes()->sync( $request->get( 'dishes' ) );
        self::updateCategorySort();
    }

    public function dishMoveUp( Dish $dish ) {
        $old_sort = $this->dishes()->where( 'categorizable_id', $dish->id )->first()->pivot->sort;
        $this->dishes()->updateExistingPivot( $dish, [ 'sort' => $old_sort - 15 ], true );
        $this->updateDishSort();
    }

    public function dishMoveDown( Dish $dish ) {
        $old_sort = $this->dishes()->where( 'categorizable_id', $dish->id )->first()->pivot->sort;
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

    public static function updateCategorySort() {
        $cnt = 10;
        foreach( Category::orderby( 'sort' )->get() as $category ) {
            $category->sort = $cnt;
            $cnt = $cnt + 10;
            $category->save();
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
