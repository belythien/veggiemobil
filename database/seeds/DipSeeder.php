<?php

use Illuminate\Database\Seeder;

class DipSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table( 'dips' )->insert( [
            'slug'  => 'mayo',
            'title' => 'Mayo',
        ] );

        DB::table( 'dips' )->insert( [
            'slug'  => 'aioli',
            'title' => 'Aioli',
        ] );

        DB::table( 'dips' )->insert( [
            'slug'  => 'ketchup',
            'title' => 'Ketchup',
        ] );

        DB::table( 'dips' )->insert( [
            'slug'  => 'tomate-chili',
            'title' => 'Tomate-Chili',
        ] );

        DB::table( 'dips' )->insert( [
            'slug'  => 'barbecue',
            'title' => 'Barbecue',
        ] );

        DB::table( 'dips' )->insert( [
            'slug'  => 'mango-kokos',
            'title' => 'Mango-Kokos',
        ] );
    }
}
