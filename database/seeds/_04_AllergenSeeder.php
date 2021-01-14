<?php

use App\Allergen;
use Illuminate\Database\Seeder;

class _04_AllergenSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [ 'name' => 'Weizen' ],
            [ 'name' => 'Soja' ],
            [ 'name' => 'Senf' ],
            [ 'name' => 'Lupine' ],
            [ 'name' => 'Cashew' ],
            [ 'name' => 'Sellerie' ],
            [ 'name' => 'Gerste' ],
            [ 'name' => 'Roggen' ],
            [ 'name' => 'Sesam' ],
            [ 'name' => 'Nüsse' ],
            [ 'name' => 'Mandel' ],
            [ 'name' => 'Hafer' ],
            [ 'name' => 'Dinkel' ],
        ];

        foreach( $data as $key => $arr ) {
            $object = new Allergen();
            $object->name = $arr[ 'name' ];
            $object->save();
        }
    }
}
