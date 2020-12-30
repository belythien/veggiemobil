<?php

use App\Dip;
use App\Dish;
use Illuminate\Database\Seeder;

class DipDishSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        foreach( Dip::all() as $dip ) {
            DB::table( 'dip_dish' )->insert( [
                'dip_id'  => $dip->id,
                'dish_id' => Dish::where( 'slug', 'suesskartoffel-pommes' )->first()->id,
            ] );
        }

    }
}
