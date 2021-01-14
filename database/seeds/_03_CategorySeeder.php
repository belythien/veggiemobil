<?php

use App\Category;
use Illuminate\Database\Seeder;

class _03_CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $data = [
            [
                'title' => 'Truck-Menü',
                'text'  => 'Wenn Sie das Veggiemobil auf Festivals und Messen etc. antreffen, gibt es diese Speisen zur Auswahl. Aber wir können noch viel mehr! Buchen Sie uns für Ihre Feier und wir verwöhnen Sie nach Ihren individuellen, veganen Wünschen.',
                'live'  => 1
            ],
            [
                'title' => 'Vorspeisen',
                'text'  => '',
                'live'  => 1
            ],
            [
                'title' => 'Hauptgerichte',
                'text'  => '',
                'live'  => 1
            ],
            [
                'title' => 'Beilagen',
                'text'  => '',
                'live'  => 1
            ],
            [
                'title' => 'Nachspeisen',
                'text'  => '',
                'live'  => 1
            ],
            [
                'title' => 'Suppen',
                'text'  => '',
                'live'  => 1
            ],
            [
                'title' => 'Salate',
                'text'  => '',
                'live'  => 1
            ],
            [
                'title' => 'Advent/Weihnachten',
                'text'  => '',
                'live'  => 0
            ],
            [
                'title' => 'Winter',
                'text'  => '',
                'live'  => 0
            ],
            [
                'title' => 'Frühling',
                'text'  => '',
                'live'  => 0
            ],
            [
                'title' => 'Sommer',
                'text'  => '',
                'live'  => 0
            ],
            [
                'title' => 'Herbst',
                'text'  => '',
                'live'  => 0
            ]
        ];

        foreach( $data as $key => $arr ) {
            $object = new Category();
            $object->title = $arr[ 'title' ];
            $object->text = $arr[ 'text' ];
            $object->live = $arr[ 'live' ];
            $object->sort = ( $key + 1 ) * 10;
            $object->save();
        }

    }
}
