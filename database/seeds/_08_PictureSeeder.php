<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class _08_PictureSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        foreach( File::files( public_path() . '/img/' ) as $image ) {
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
                        'falafel-wrap',
                        'karotten-mango-suppe',
                        'kraeuterseitling-auf-baerlauchcreme',
                        'pflaumen-mohn-kuchen',
                        'power-burger',
                        'power-wrap',
                        'pulled-jack-teller',
                        'salat-rumpelstilzchen',
                        'suesskartoffel-pommes',
                        'sweet-chili-cheeze-fries',
                        'weihnachtstraum',
                        'weisse-lasagne-mit-butternuss-kuerbis-und-spinat',
                        'winterrolls',
                        'zwetschgen-crumble-mit-vanilleeis',
                        'zwetschgen-tomaten-bruschetta',
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
