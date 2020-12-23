<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishPage extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'dish_page', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'page_id' )->unsigned()->index();
            $table->bigInteger( 'dish_id' )->unsigned()->index();
            $table->integer( 'sort' )->unsigned()->default( 0 );
            $table->timestamps();

            $table->foreign( 'page_id' )->references( 'id' )->on( 'pages' )->onDelete( 'cascade' );
            $table->foreign( 'dish_id' )->references( 'id' )->on( 'dishes' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'dish_page' );
    }
}
