<?php

use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table( 'allergens' )->insert( [
            'name' => 'Weizen',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Soja',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Senf',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Lupine',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Cashew',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Sellerie',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Gerste',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Roggen',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Sesam',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Nüsse',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Mandel',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Hafer',
        ] );

        DB::table( 'allergens' )->insert( [
            'name' => 'Dinkel',
        ] );

    }
}
