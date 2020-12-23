<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'users' )->insert( [
            'name'     => 'Sebastian Höwer',
            'email'    => 's.hoewer@gmail.com',
            'password' => Hash::make( '123456789' ),
        ] );
    }
}
