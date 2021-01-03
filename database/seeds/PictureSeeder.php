<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PictureSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        foreach( File::allFiles( public_path() . '/img/' ) as $image ) {
            if( $image->getExtension() != 'svg' ) {
                DB::table( 'pictures' )->insert( [
                    'slug'     => $image->getFilenameWithoutExtension(),
                    'title'    => $image->getFilenameWithoutExtension(),
                    'text'     => '',
                    'live'     => 1,
                    'welcome'  => in_array( $image->getFilenameWithoutExtension(), [
                        'baklava',
                        'caprese',
                        'champion-burger',
                        'erdbeer-prosecco-slush',
                        'falafel-wrap',
                        'flammkuchen',
                        'kuerbis-lasagne',
                        'pflaumen-mohn-kuchen',
                        'power-burger',
                        'power-wrap',
                        'pulled-jack-schale',
                        'rumpelstilzchen',
                        'suesskartoffel-pommes',
                        'sweet-chili-cheeze-fries',
                        'zwetschgen-crumble',
                        'zwetschgen-tomaten-bruschetta'
                    ] ) ? 1 : 0,
                    'filename' => $image->getRelativePathName(),
                    'filesize' => $image->getSize(),
                    'width'    => getimagesize( $image )[ 0 ],
                    'height'   => getimagesize( $image )[ 1 ]
                ] );
            }
        }

    }
}
