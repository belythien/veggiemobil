<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'events' )->insert( [
            'slug'      => 'darmstadt-schlossgrabenfest-2017',
            'title'     => 'Darmstadt Schloßgrabenfest 2017',
            'text'      => '',
            'date_from' => '2017-05-25',
            'date_to'   => '2017-05-28',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'oberhausen-2016',
            'title'     => 'Oberhausen 2016',
            'text'      => '',
            'date_from' => '2016-11-26',
            'date_to'   => '2016-11-27',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'hamburg-2016',
            'title'     => 'Hamburg 2016',
            'text'      => '',
            'date_from' => '2016-11-04',
            'date_to'   => '2016-11-06',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'wiesbaden-halloweenspecial-2016',
            'title'     => 'Wiesbaden Halloweenspecial 2016',
            'text'      => '',
            'date_from' => '2016-10-27',
            'date_to'   => '2016-10-30',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'essen-2016',
            'title'     => 'Essen 2016',
            'text'      => '',
            'date_from' => '2016-10-21',
            'date_to'   => '2016-10-23',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'mannheim-2016',
            'title'     => 'Mannheim 2016',
            'text'      => '',
            'date_from' => '2016-10-15',
            'date_to'   => '2016-10-16',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'hannover-2016',
            'title'     => 'Hannover 2016',
            'text'      => '',
            'date_from' => '2016-10-07',
            'date_to'   => '2016-10-09',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'gardelegen-2016',
            'title'     => 'Gardelegen 2016',
            'text'      => '',
            'date_from' => '2016-09-23',
            'date_to'   => '2016-09-25',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'aschersleben-2016',
            'title'     => 'Aschersleben 2016',
            'text'      => '',
            'date_from' => '2016-09-16',
            'date_to'   => '2016-09-18',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'magdeburg-2016',
            'title'     => 'Magdeburg 2016',
            'text'      => '',
            'date_from' => '2016-09-09',
            'date_to'   => '2016-09-11',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'weihnachtsmarkt-oestrich-winkel-2016',
            'title'     => 'Weihnachtsmarkt Oestrich-Winkel 2016',
            'text'      => '',
            'date_from' => '2016-12-10',
            'date_to'   => '2016-12-11',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'pullman-city-hartz-weihnachtsmarkt-2016',
            'title'     => 'Pullman City Hartz Weihnachtsmarkt 2016',
            'text'      => '',
            'date_from' => '2016-12-03',
            'date_to'   => '2016-12-04',
            'live'      => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'      => 'quedlinburg-2016',
            'title'     => 'Quedlinburg 2016',
            'text'      => '',
            'date_from' => '2016-09-30',
            'date_to'   => '2016-10-03',
            'live'      => 1,
        ] );
    }
}
