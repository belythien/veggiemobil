<?php

use App\Dish;
use App\Picture;
use Illuminate\Database\Seeder;

class PicturableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        foreach( Dish::join( 'pictures', 'pictures.slug', '=', 'dishes.slug' )
                     ->selectRaw( 'pictures.id AS picture_id, dishes.id AS dish_id' )
                     ->get() as $picturable ) {
            DB::table( 'picturables' )->insert( [
                'picture_id'      => $picturable->picture_id,
                'picturable_id'   => $picturable->dish_id,
                'picturable_type' => 'App\Dish',
            ] );
        }

    }
}
