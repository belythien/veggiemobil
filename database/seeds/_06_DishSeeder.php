<?php

use App\Dish;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class _06_DishSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $data = [
            [
                'title'      => 'Champion-Burger',
                'text'       => 'Bratling aus Champignons, Sonnenblumenkernen, glatter Petersilie, Walnüssen und roten Zwiebeln im Laugenbrötchen dazu süßer Senf, Sandwich-Gurken, Tomaten, Rucola, gebratene Zwiebeln, Tomaten-Paprika-Soße',
                'allergens'  => [ 3 ],
                'categories' => [ 1, 3 ]
            ], [
                'title'      => 'Power-Wrap',
                'text'       => 'Avocado-Creme, Blattsalat, Sandwich-Gurken, Tomaten, Süßkartoffeln, schwarze Bohnen, Jalapeños, Nachos, Tomaten-Chili-Soße',
                'allergens'  => [ 1, 4 ],
                'categories' => [ 1, 3 ]
            ], [
                'title'      => 'Sweet-Chili-Cheeze-Fries',
                'text'       => 'Süßkartoffel-Pommes, Jalapeños, selbst gemachte Cheeze-Soße',
                'categories' => [ 1, 4 ]
            ], [
                'title'      => 'Pulled-Jack-Teller',
                'text'       => 'Jackfrucht in Barbecue-Soße auf selbstgemachtem Krautsalat und Süßkartoffel-Pommes',
                'categories' => [ 1, 3 ]
            ], [
                'title'      => 'Süßkartoffel-Pommes',
                'text'       => 'mit selbstgemachtem Dip zur Wahl:',
                'dips'       => [ 1, 2, 3, 4, 5, 6 ],
                'categories' => [ 1, 4 ]
            ], [
                'title'      => 'Baklava',
                'text'       => '',
                'allergens'  => [ 1, 10 ],
                'categories' => [ 5 ]
            ], [
                'title'      => 'Caprese',
                'text'       => 'Tomaten, Flohzarella, Olivenöl, Balsamico und frischer Basilikum',
                'allergens'  => [ 6 ],
                'categories' => [ 2 ]
            ], [
                'title'      => 'Falafel-Wrap',
                'text'       => 'selbst gemachte Falafel, Mais, Tomaten, Gurken, Blattsalat, Hummus, Möhren, Tomaten-Chili-Sauce',
                'allergens'  => [ 1 ],
                'categories' => [ 3 ]
            ], [
                'title'      => 'Salat »Rumpelstilzchen«',
                'text'       => 'Blattsalat, rote Zwiebeln, Paprika, Möhren, Cocktail-Tomaten, gebratene Champignons und karamellisierte Walnüsse',
                'categories' => [ 7 ]
            ], [
                'title'      => 'Zwetschgen-Tomaten-Bruschetta',
                'text'       => '',
                'categories' => [ 2 ]
            ], [
                'title'      => 'Hokkaido-Cremesuppe mit Zwetschgen-Chutney',
                'text'       => '',
                'categories' => [ 6 ]
            ], [
                'title'      => 'Weiße Lasagne mit Butternuss-Kürbis und Spinat',
                'text'       => '',
                'allergens'  => [ 1, 2, 5 ],
                'categories' => [ 3 ]
            ], [
                'title'      => 'Pflaumen-Mohn-Kuchen',
                'text'       => '',
                'allergens'  => [ 1, 2, 5, 11 ],
                'categories' => [ 5 ]
            ], [
                'title'      => 'Christmas-Champion-Burger',
                'text'       => 'Laugenbrötchen, Apfelkompott, Zwetschgen-Chutney, Rotkohl, Rucola, Bratling aus Champignons, Walnüssen, glatter Petersilie, Kräutern und Sonnenblumenkernen',
                'allergens'  => [ 1 ],
                'categories' => [ 3, 8 ]
            ], [
                'title'      => 'Weihnachtstraum',
                'text'       => 'Spekulatius, Kirschcreme, geröstete Mandeln',
                'allergens'  => [ 11 ],
                'categories' => [ 5, 8 ]
            ], [
                'title'      => 'Marokkanischer Gemüseeintopf',
                'text'       => '',
                'categories' => [ 6 ]
            ], [
                'title'      => 'Mango-Linsen-Curry',
                'text'       => '',
                'categories' => [ 3 ]
            ], [
                'title'      => 'Kartoffelecken mit Sourcreme und Tomate-Chili-Dip',
                'text'       => '',
                'categories' => [ 4 ]
            ], [
                'title'      => 'Scharfe schwarze Bohnensuppe mit Avocado und Sour-Creme',
                'text'       => '',
                'categories' => [ 6 ]
            ], [
                'title'      => 'Klassischer Couscous-Salat',
                'text'       => '',
                'categories' => [ 7 ]
            ], [
                'title'      => 'Fruchtiger Pfirsich-Reis-Salat',
                'text'       => '',
                'categories' => [ 7 ]
            ], [
                'title'      => 'Winterrolls',
                'text'       => 'Wirsing, Rotkohl, Möhre, Sprossen, Petersilie mit Kürbisdip und Curryjogurt',
                'allergens'  => [ 1, 2, 9, 10 ],
                'categories' => [ 2, 9 ]
            ], [
                'title'      => 'Rote-Beete-Tartar',
                'text'       => 'mit Gurken-Birnen-Salat koreanisch',
                'allergens'  => [ 1, 9 ],
                'categories' => [ 2, 10 ]
            ], [
                'title'      => 'Kräuterseitling auf Bärlauchcreme',
                'text'       => 'an Wildkräutersalat mit Himbeerdressing und Schwarzbrot',
                'allergens'  => [ 2, 3, 8 ],
                'categories' => [ 2, 10 ]
            ], [
                'title'      => 'Karotten-Mango-Suppe',
                'text'       => '',
                'allergens'  => [ 9 ],
                'categories' => [ 6 ]
            ], [
                'title'      => 'Zwetschgen-Crumble mit Vanilleeis',
                'text'       => '',
                'categories' => [ 5, 12 ]
            ]
        ];

        foreach( $data as $arr ) {
            $object = new Dish();
            $object->title = $arr[ 'title' ];
            $object->text = $arr[ 'text' ];
            $object->live = 1;
            $object->save();
            if( array_key_exists( 'allergens', $arr ) ) {
                $object->allergens()->sync( $arr[ 'allergens' ] );
            }
            if( array_key_exists( 'dips', $arr ) ) {
                $object->dips()->sync( $arr[ 'dips' ] );
            }
            if( array_key_exists( 'categories', $arr ) ) {
                $object->categories()->sync( $arr[ 'categories' ] );
            }
        }
    }
}
