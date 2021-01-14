<?php

use App\Dip;
use Illuminate\Database\Seeder;

class _05_DipSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [ 'title' => 'Mayo', 'allergens' => [ 2, 3 ] ],
            [ 'title' => 'Aioli', 'allergens' => [ 2 ] ],
            [ 'title' => 'Ketchup' ],
            [ 'title' => 'Tomate-Chili' ],
            [ 'title' => 'Barbecue', 'allergens' => [ 3, 6, 7 ] ],
            [ 'title' => 'Mango-Kokos' ]
        ];

        foreach( $data as $arr ) {
            $object = new Dip();
            $object->title = $arr[ 'title' ];
            $object->save();
            if( array_key_exists( 'allergens', $arr ) ) {
                $object->allergens()->sync( $arr[ 'allergens' ] );
            }
        }
    }
}
