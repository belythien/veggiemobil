<?php

use App\Category;
use App\Dish;
use Illuminate\Database\Seeder;

class CategorizableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Truck-Menü
        $category = Category::where( 'slug', 'truck-menu' )->first();
        if( !empty( $category ) ) {
            foreach( Dish::whereIn( 'slug', [
                'champion-burger',
                'power-wrap',
                'sweet-chili-cheeze-fries',
                'pulled-jack-schale',
                'suesskartoffel-pommes'
            ] )->get() as $dish ) {
                DB::table( 'categorizables' )->insert( [
                    'category_id'        => $category->id,
                    'categorizable_id'   => $dish->id,
                    'categorizable_type' => 'App\Dish',
                ] );
            }
        }

        // Vorspeisen
        $category = Category::where( 'slug', 'vorspeisen' )->first();
        if( !empty( $category ) ) {
            foreach( Dish::whereIn( 'slug', [
                'caprese',
                'rumpelstilzchen',
                'zwetschgen-tomaten-bruschetta',
                'klassischer-couscous-salat',
                'fruchtiger-pfirsich-reis-salat'
            ] )->get() as $dish ) {
                DB::table( 'categorizables' )->insert( [
                    'category_id'        => $category->id,
                    'categorizable_id'   => $dish->id,
                    'categorizable_type' => 'App\Dish',
                ] );
            }
        }

        // Hauptgerichte
        $category = Category::where( 'slug', 'hauptgerichte' )->first();
        if( !empty( $category ) ) {
            foreach( Dish::whereIn( 'slug', [
                'champion-burger',
                'power-wrap',
                'pulled-jack-schale',
                'flammkuchen',
                'falafel-wrap',
                'kuerbis-lasagne',
                'marokkanischer-gemueseeintopf',
                'mango-linsen-curry',
                'scharfe-schwarze-bohnensuppe-mit-avocado-und-sour-creme',
                'weisse-lasagne-mit-butternuss-kuerbis-und-spinat',
                'hokkaido-cremesuppe-mit-zwetschgen-chutney',
            ] )->get() as $dish ) {
                DB::table( 'categorizables' )->insert( [
                    'category_id'        => $category->id,
                    'categorizable_id'   => $dish->id,
                    'categorizable_type' => 'App\Dish',
                ] );
            }
        }

        // Beilagen
        $category = Category::where( 'slug', 'beilagen' )->first();
        if( !empty( $category ) ) {
            foreach( Dish::whereIn( 'slug', [
                'sweet-chili-cheeze-fries',
                'suesskartoffel-pommes',
                'kartoffelecken-mit-sourcreme-und-tomate-chili-dip',
                'klassischer-couscous-salat'
            ] )->get() as $dish ) {
                DB::table( 'categorizables' )->insert( [
                    'category_id'        => $category->id,
                    'categorizable_id'   => $dish->id,
                    'categorizable_type' => 'App\Dish',
                ] );
            }
        }

        // Nachspeisen
        $category = Category::where( 'slug', 'nachspeisen' )->first();
        if( !empty( $category ) ) {
            foreach( Dish::whereIn( 'slug', [
                'baklava',
                'apfel-birnen-crumble',
                'pflaumen-mohn-kuchen',
            ] )->get() as $dish ) {
                DB::table( 'categorizables' )->insert( [
                    'category_id'        => $category->id,
                    'categorizable_id'   => $dish->id,
                    'categorizable_type' => 'App\Dish',
                ] );
            }
        }

        // Advent / Weihnachten
        $category = Category::where( 'slug', 'advent-weihnachten' )->first();
        if( !empty( $category ) ) {
            foreach( Dish::whereIn( 'slug', [
                'christmas-champion-burger',
                'weihnachtstraum',
            ] )->get() as $dish ) {
                DB::table( 'categorizables' )->insert( [
                    'category_id'        => $category->id,
                    'categorizable_id'   => $dish->id,
                    'categorizable_type' => 'App\Dish',
                ] );
            }
        }

    }
}
