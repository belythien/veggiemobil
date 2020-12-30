<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenDip extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'allergen_dip', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'allergen_id' )->unsigned()->index();
            $table->bigInteger( 'dip_id' )->unsigned()->index();

            $table->foreign( 'allergen_id' )->references( 'id' )->on( 'allergens' )->onDelete( 'cascade' );
            $table->foreign( 'dip_id' )->references( 'id' )->on( 'dips' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'allergen_dip' );
    }
}
