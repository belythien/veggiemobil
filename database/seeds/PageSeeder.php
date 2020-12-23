<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'pages' )->insert( [
            'slug'     => 'speisekarte',
            'template' => 'speisekarte',
            'title'    => 'Speisekarte',
            'text'     => '<p>Uns zeichnet ein vielfältiges variierendes Angebot aus, welches wir ständig durch neue eigene Kreationen erweitern.</p><p>Für Anregungen und Wünsche sind wir immer gerne offen.</p><p>Hier finden Sie all unsere beliebten Spezialitäten auf einen Blick.</p>',
            'live'     => 1
        ] );

        DB::table( 'pages' )->insert( [
            'slug'     => 'catering',
            'template' => 'catering',
            'title'    => 'Catering',
            'text'     => 'Lorem ipsum',
            'live'     => 1
        ] );

        DB::table( 'pages' )->insert( [
            'slug'     => 'events',
            'template' => 'events',
            'title'    => 'Events',
            'text'     => 'Lorem ipsum',
            'live'     => 1
        ] );

        DB::table( 'pages' )->insert( [
            'slug'  => 'impressum',
            'title' => 'Impressum',
            'text'  => 'Lorem ipsum',
            'live'  => 1
        ] );

        DB::table( 'pages' )->insert( [
            'slug'  => 'datenschutz',
            'title' => 'Datenschutz',
            'text'  => 'Lorem ipsum',
            'live'  => 1
        ] );

    }
}
