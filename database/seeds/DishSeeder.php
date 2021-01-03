<?php

use Illuminate\Database\Seeder;

class DishSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table( 'dishes' )->insert( [
            'slug'  => 'champion-burger',
            'title' => 'Champion-Burger',
            'text'  => 'Bratling aus Champignons, Sonnenblumenkernen, glatter Petersilie, Walnüssen und roten Zwiebeln im Laugenbrötchen dazu süßer Senf, Sandwich-Gurken, Tomaten, Rucola, gebratene Zwiebeln, Tomaten-Paprika-Soße',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'power-wrap',
            'title' => 'Power-Wrap',
            'text'  => 'Avocado-Creme, Blattsalat, Sandwich-Gurken, Tomaten, Süßkartoffeln, schwarze Bohnen, Jalapeños, Nachos, Tomaten-Chili-Soße',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'sweet-chili-cheeze-fries',
            'title' => 'Sweet-Chili-Cheeze-Fries',
            'text'  => 'Süßkartoffel-Pommes, Jalapeños, selbst gemachte Cheeze-Soße',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'pulled-jack-schale',
            'title' => '»Pulled Jack«-Schale',
            'text'  => 'Jackfrucht in Barbecue-Soße auf selbstgemachtem Krautsalat und Süßkartoffel-Pommes',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'suesskartoffel-pommes',
            'title' => 'Süßkartoffel-Pommes',
            'text'  => 'mit selbstgemachtem Dip zur Wahl:',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'baklava',
            'title' => 'Baklava',
            'text'  => '',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'caprese',
            'title' => 'Caprese',
            'text'  => 'Tomaten, Flohzarella, Olivenöl, Balsamico und frischer Basilikum',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'flammkuchen',
            'title' => 'Flammkuchen',
            'text'  => '',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'falafel-wrap',
            'title' => 'Falafel-Wrap',
            'text'  => 'selbst gemachter Falafel, Mais, Tomaten, Gurken, Blattsalat, Hummus, Möhren, Tomaten-Chili-Sauce',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'kuerbis-lasagne',
            'title' => 'Kürbis-Lasagne',
            'text'  => '',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'rumpelstilzchen',
            'title' => 'Salat »Rumpelstilzchen«',
            'text'  => 'Blattsalat, rote Zwiebeln, Paprika, Möhren, Cocktail-Tomaten, gebratene Champignons und karamellisierte Walnüsse',
            'live'  => 1
        ] );

        DB::table( 'dishes' )->insert( [
            'slug'  => 'zwetschgen-tomaten-bruschetta',
            'title' => 'Zwetschgen-Tomaten-Bruschetta',
            'text'  => '',
            'live'  => 1
        ] );



        DB::table( 'dishes' )->insert( [
            'slug'  => 'marokkanischer-gemueseeintopf',
            'title' => 'Marokkanischer Gemüseeintopf',
            'text'  => '',
            'live'  => 1
        ] );
        DB::table( 'dishes' )->insert( [
            'slug'  => 'mango-linsen-curry',
            'title' => 'Mango-Linsen-Curry',
            'text'  => '',
            'live'  => 1
        ] );
        DB::table( 'dishes' )->insert( [
            'slug'  => 'kartoffelecken-mit-sourcreme-und-tomate-chili-dip',
            'title' => 'Kartoffelecken mit Sourcreme und Tomate-Chili-Dip',
            'text'  => '',
            'live'  => 1
        ] );
        DB::table( 'dishes' )->insert( [
            'slug'  => 'scharfe-schwarze-bohnensuppe-mit-avocado-und-sour-creme',
            'title' => 'Scharfe schwarze Bohnensuppe mit Avocado und Sour-Creme',
            'text'  => '',
            'live'  => 1
        ] );
        DB::table( 'dishes' )->insert( [
            'slug'  => 'klassischer-couscous-salat',
            'title' => 'Klassischer Couscous-Salat',
            'text'  => '',
            'live'  => 1
        ] );
        DB::table( 'dishes' )->insert( [
            'slug'  => 'fruchtiger-pfirsich-reis-salat',
            'title' => 'Fruchtiger Pfirsich-Reis-Salat',
            'text'  => '',
            'live'  => 1
        ] );







    }
}
