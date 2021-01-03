<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table( 'categories' )->insert( [
            'title' => 'Truck-Menü',
            'slug'  => 'truck-menu',
            'text'  => 'Wenn Sie das Veggiemobil auf Festivals und Messen etc. antreffen, gibt es diese Speisen zur Auswahl. Aber wir können noch viel mehr! Buchen Sie uns für Ihre Feier und wir verwöhnen Sie nach Ihren individuellen, veganen Wünschen.',
            'sort'  => 10,
        ] );

        DB::table( 'categories' )->insert( [
            'title' => 'Vorspeisen',
            'slug'  => 'vorspeisen',
            'sort'  => 20,
        ] );

        DB::table( 'categories' )->insert( [
            'title' => 'Hauptgerichte',
            'slug'  => 'hauptgerichte',
            'sort'  => 30,
        ] );

        DB::table( 'categories' )->insert( [
            'title' => 'Beilagen',
            'slug'  => 'beilagen',
            'sort'  => 40,
        ] );

        DB::table( 'categories' )->insert( [
            'title' => 'Nachspeisen',
            'slug'  => 'nachspeisen',
            'sort'  => 50,
        ] );

    }
}
