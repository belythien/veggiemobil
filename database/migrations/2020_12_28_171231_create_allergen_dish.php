<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenDish extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'allergen_dish', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'allergen_id' )->unsigned()->index();
            $table->bigInteger( 'dish_id' )->unsigned()->index();
            $table->timestamp( 'ts' )->default( \DB::raw( 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP' ) );

            $table->foreign( 'allergen_id' )->references( 'id' )->on( 'allergens' )->onDelete( 'cascade' );
            $table->foreign( 'dish_id' )->references( 'id' )->on( 'dishes' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'allergen_dish' );
    }
}
