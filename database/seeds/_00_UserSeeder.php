<?php

use Illuminate\Database\Seeder;

class _00_UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'users' )->insert( [
            'name'     => 'Birgit Jung',
            'email'    => 'info@veggiemobil.com',
            'password' => Hash::make( '$w33t-$AU3rkrAUt-bUrg3r' ),
        ]);

        DB::table( 'users' )->insert( [
            'name'     => 'Sebastian Höwer',
            'email'    => 's.hoewer@gmail.com',
            'password' => Hash::make( '$w33t-$AU3rkrAUt-bUrg3r' ),
        ]);
    }
}
