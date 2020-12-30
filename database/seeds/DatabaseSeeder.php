<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call( UserSeeder::class );
        $this->call( PageSeeder::class );
        $this->call( MenuSeeder::class );
        $this->call( DishSeeder::class );
        $this->call( DipSeeder::class );
        $this->call( AllergenSeeder::class );
        $this->call( AllergenDishSeeder::class );
        $this->call( AllergenDipSeeder::class );
        $this->call( DipDishSeeder::class );
        $this->call( EventSeeder::class );
        $this->call( PictureSeeder::class );

        $this->call( MenuPageSeeder::class );
        $this->call( DishPageSeeder::class );
        $this->call( PicturableSeeder::class );
    }
}
