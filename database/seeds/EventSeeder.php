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

        /* ================================ */

        DB::table( 'events' )->insert( [
            'slug'         => 'great-barrier-run-goettingen-2021',
            'title'        => 'Great Barrier Run • Göttingen • 2021',
            'text'         => '<strong>Einer der spektakulärsten Hindernisläufe geht in die 6. Auflage</strong><br>Der Great Barrier Run, Südniedersachsens Hindernislauf Nummer 1 und eine der spektakulärsten Sportveranstaltungen in Mitteldeutschland geht 2021 in seine 6. Auflage.<br>Nach den Teilnehmer-Rekorden im letzten Jahr, sowohl beim Erwachsenenlauf mit über 3.000 Teilnehmern und dem Great Barrier Run KIDS mit über 450 Teilnehmern, erwarten wir auch in diesem Jahr wieder viele tausende Sportverrückte.',
            'date_from'    => '2021-03-27',
            'date_to'      => null,
            'external_url' => 'https://www.great-barrier-run.de/great-barrier-run-2021/',
            'live'         => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'         => 'sportaktiv-die-sport-und-outdoormesse-2021',
            'title'        => 'sport.aktiv • Die Sport- und Outdoormesse • 2021',
            'text'         => 'Von Akrobatik bis Yoga.<br>Erlebe Neues, Innovatives und Trendiges für Sport und Lifestyle bei Thüringens größtem Sportevent.<br>Ob persönliche Vorliebe für ein, zwei oder doch lieber vier Räder – auf der „sport.aktiv“ findet jeder Besucher das Passende.',
            'date_from'    => '2021-04-10',
            'date_to'      => '2021-04-11',
            'external_url' => 'https://www.sportaktiv-erfurt.de/',
            'live'         => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'         => 'rock-den-acker-open-air-2021',
            'title'        => 'ROCK DEN ACKER OPEN AIR 2021',
            'text'         => 'Das Rock den Acker - Open Air ist ein kleines, gemütliches Rock und Metal Festival in familiärer Atmosphäre. Zwei Tage lang erwartet Dich allerfeinste Rockmusik von insgesamt 18 Bands. Das ausgewogene Line Up sorgt dafür, dass auch für Dich etwas dabei ist.',
            'date_from'    => '2021-05-21',
            'date_to'      => '2021-05-23',
            'external_url' => 'https://www.festival-alarm.com/Festivals-2021/Rock-den-Acker-Open-Air-Freitag-21.-Mai-2021-Nidderau',
            'live'         => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'         => 'green-world-tour-heidelberg-2021',
            'title'        => 'Green World Tour Heidelberg 2021',
            'text'         => 'Die Nachhaltigkeits-Messe in Heidelberg am 26. und 27. Juni 2021<br>Aussteller und Vorträge aus folgenden Bereichen erwarten dich:<br><ul><li>Ernährung & Gesundheit</li><li>Freizeit & Wohnen</li><li>Design & Mode</li><li>Studium & Karriere</li><li>Innovation & Wissenschaft</li><li>Strom & Wärme</li><li>Bauen & Sanieren</li><li>Mobilität & Logistik</li><li>Geld & Versicherungen</li><li>Gewerbe & CSR</li></ul>',
            'date_from'    => '2021-06-26',
            'date_to'      => '2021-06-27',
            'external_url' => 'https://autarkia.info/green-world-tour-heidelberg/',
            'live'         => 1,
        ] );

        DB::table( 'events' )->insert( [
            'slug'         => 'trebur-open-air-2021',
            'title'        => 'Trebur Open Air 2021',
            'text'         => 'EINE HAND VOLL BUNT GEMISCHTEM SPASS<br>...INTERNATIONAL, REGIONAL, LAUT, LEISE, ALTE HASEN, NEWCOMER...<br>Das Trebur Open Air ist ja für seine bunt gemischte, aber stets handverlesene Auswahl an Künstlern und Künstlerinnen bekannt – hier bekommst Du nicht nur eine Übersicht über die 3 Bühnen und rund 50 MusikerInnen, sondern auch darüber, was außerhalb der Bühnen noch so passiert.<br>Denn als ob wir musikalisch nicht schon für jeden was dabei haben – drumherum passiert auch noch ganz schön viel! Ein Katzensprung ins Freibad, das über das Festivalwochenende quasi ins Trebur Open Air integriert wird! Dort gibt es allerlei zu erleben, ob Lesungen, Bier-Yoga, toalympics, Kinderarea, Bingo… ',
            'date_from'    => '2021-08-06',
            'date_to'      => '2021-08-08',
            'external_url' => 'https://treburopenair.de/',
            'live'         => 1,
        ] );
    }
}
