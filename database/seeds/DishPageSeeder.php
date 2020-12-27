<?php

use App\Dish;
use App\Page;
use Illuminate\Database\Seeder;

class DishPageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $page = Page::where( 'slug', 'truck-menu' )->first();
        foreach( Dish::whereIn( 'slug', [
            'champion-burger',
            'power-wrap',
            'sweet-chili-cheeze-fries',
            'pulled-jack-schale',
            'suesskartoffel-pommes'
        ] )->get() as $key => $dish ) {
            DB::table( 'dish_page' )->insert( [
                'page_id' => $page->id,
                'dish_id' => $dish->id,
                'sort'    => ( $key + 1 ) * 10,
            ] );
        }

        $page = Page::where( 'slug', 'catering' )->first();
        foreach( Dish::all() as $key => $dish ) {
            DB::table( 'dish_page' )->insert( [
                'page_id' => $page->id,
                'dish_id' => $dish->id,
                'sort'    => ( $key + 1 ) * 10,
            ] );
        }
    }
}
