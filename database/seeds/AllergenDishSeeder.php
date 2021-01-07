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
        foreach( Dish::whereIn( 'slug', [
            'power-wrap',
            'falafel-wrap',
            'jack-wrap',
            'baklava',
            'weisse-lasagne-mit-butternuss-kuerbis-und-spinat',
            'apfel-birnen-crumble',
            'pflaumen-mohn-kuchen',
            'christmas-champion-burger',
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 1,
                'dish_id'     => $dish->id
            ] );
        }

        // 2) Soja
        foreach( Dish::whereIn( 'slug', [
            'jack-wrap',
            'weisse-lasagne-mit-butternuss-kuerbis-und-spinat',
            'apfel-birnen-crumble',
            'pflaumen-mohn-kuchen',
            'sweet-sauerkraut-burger'
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 2,
                'dish_id'     => $dish->id
            ] );
        }

        // 3) Senf
        foreach( Dish::whereIn( 'slug', [
            'champion-burger'
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 3,
                'dish_id'     => $dish->id
            ] );
        }

        // 4) Lupine
        foreach( Dish::whereIn( 'slug', [
            'power-burger',
            'power-wrap'
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 4,
                'dish_id'     => $dish->id
            ] );
        }

        // 5) Cashew
        foreach( Dish::whereIn( 'slug', [
            'weisse-lasagne-mit-butternuss-kuerbis-und-spinat',
            'apfel-birnen-crumble',
            'pflaumen-mohn-kuchen',
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 5,
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

        // 8) Roggen
        foreach( Dish::whereIn( 'slug', [ 'sweet-sauerkraut-burger' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 8,
                'dish_id'     => $dish->id
            ] );
        }

        // 10) Nüsse
        foreach( Dish::whereIn( 'slug', [ 'rumpelstilzchen', 'baklava', 'apfel-birnen-crumble' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 10,
                'dish_id'     => $dish->id
            ] );
        }

        // 11) Mandel
        foreach( Dish::whereIn( 'slug', [
            'apfel-birnen-crumble',
            'pflaumen-mohn-kuchen',
            'weihnachtstraum'
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 11,
                'dish_id'     => $dish->id
            ] );
        }

        // 12) Hafer
        foreach( Dish::whereIn( 'slug', [
            'apfel-birnen-crumble'
        ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 12,
                'dish_id'     => $dish->id
            ] );
        }

        // 13) Dinkel
        foreach( Dish::whereIn( 'slug', [ 'sweet-sauerkraut-burger' ] )->get() as $dish ) {
            DB::table( 'allergen_dish' )->insert( [
                'allergen_id' => 13,
                'dish_id'     => $dish->id
            ] );
        }
    }
}
