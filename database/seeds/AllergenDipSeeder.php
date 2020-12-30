<?php

use App\Dip;
use Illuminate\Database\Seeder;

class AllergenDipSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // 2) Soja
        foreach( Dip::whereIn( 'slug', [ 'mayo', 'aioli' ] )->get() as $dip ) {
            DB::table( 'allergen_dip' )->insert( [
                'allergen_id' => 2,
                'dip_id'      => $dip->id
            ] );
        }

        // 3) Senf
        foreach( Dip::whereIn( 'slug', [ 'mayo', 'barbecue' ] )->get() as $dip ) {
            DB::table( 'allergen_dip' )->insert( [
                'allergen_id' => 3,
                'dip_id'      => $dip->id
            ] );
        }

        // 6) Sellerie
        foreach( Dip::whereIn( 'slug', [ 'barbecue' ] )->get() as $dip ) {
            DB::table( 'allergen_dip' )->insert( [
                'allergen_id' => 6,
                'dip_id'      => $dip->id
            ] );
        }

        // 7) Gerste
        foreach( Dip::whereIn( 'slug', [ 'barbecue' ] )->get() as $dip ) {
            DB::table( 'allergen_dip' )->insert( [
                'allergen_id' => 7,
                'dip_id'      => $dip->id
            ] );
        }

    }
}
