<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call( _00_UserSeeder::class );
        $this->call( _01_MenuSeeder::class );
        $this->call( _02_PageSeeder::class );
        $this->call( _03_CategorySeeder::class );
        $this->call( _04_AllergenSeeder::class );
        $this->call( _05_DipSeeder::class );
        $this->call( _06_DishSeeder::class );
        $this->call( _07_EventSeeder::class );
        $this->call( _08_PictureSeeder::class );
        $this->call( _09_PicturableSeeder::class );
    }
}
