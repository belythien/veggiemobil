<?php

use App\Menu;
use Illuminate\Database\Seeder;

class _01_MenuSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [ 'label' => 'Welcome' ],
            [ 'label' => 'Topbar' ],
            [ 'label' => 'Footer' ],
            [ 'label' => 'Social Media' ]
        ];

        foreach( $data as $key => $arr ) {
            $object = new Menu();
            $object->label = $arr[ 'label' ];
            $object->save();
        }
    }
}
