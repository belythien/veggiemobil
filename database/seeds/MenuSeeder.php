<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'menus' )->insert( [
            'label' => 'Welcome',
        ] );

        DB::table( 'menus' )->insert( [
            'label' => 'Topbar',
        ] );

        DB::table( 'menus' )->insert( [
            'label' => 'Footer',
        ] );

        DB::table( 'menus' )->insert( [
            'label' => 'Social Media',
        ] );
    }
}
