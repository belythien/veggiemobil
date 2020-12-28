<?php

use App\Dish;
use Illuminate\Database\Seeder;

class AllergenDishSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // 1) Weizen
        foreach( Dish::whereIn( 'slug', [ 'power-wrap', 'falafel-wrap', 'jack-wrap', 'baklava' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 1,
                'dish_id'     => $dish->id
            ] );
        }

        // 2) Soja
        foreach( Dish::whereIn( 'slug', [ 'jack-wrap' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 2,
                'dish_id'     => $dish->id
            ] );
        }

        // 3) Senf
        foreach( Dish::whereIn( 'slug', [ 'champion-burger' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 3,
                'dish_id'     => $dish->id
            ] );
        }

        // 4) Lupine
        foreach( Dish::whereIn( 'slug', [ 'power-burger', 'power-wrap' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 4,
                'dish_id'     => $dish->id
            ] );
        }

        // 6) Sellerie
        foreach( Dish::whereIn( 'slug', [ 'caprese', 'jack-wrap' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 6,
                'dish_id'     => $dish->id
            ] );
        }

        // 7) Gerste
        foreach( Dish::whereIn( 'slug', [ 'pulled-jack-schale', 'jack-wrap' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 7,
                'dish_id'     => $dish->id
            ] );
        }

        // 10) Nüsse
        foreach( Dish::whereIn( 'slug', [ 'rumpelstilzchen', 'baklava' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 10,
                'dish_id'     => $dish->id
            ] );
        }
    }
}
