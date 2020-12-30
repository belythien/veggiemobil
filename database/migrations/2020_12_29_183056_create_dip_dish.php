<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipDish extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'dip_dish', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'dip_id' )->unsigned()->index();
            $table->bigInteger( 'dish_id' )->unsigned()->index();

            $table->foreign( 'dip_id' )->references( 'id' )->on( 'dips' )->onDelete( 'cascade' );
            $table->foreign( 'dish_id' )->references( 'id' )->on( 'dishes' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'dip_dish' );
    }
}
