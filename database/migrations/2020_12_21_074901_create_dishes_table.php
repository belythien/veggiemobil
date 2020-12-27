<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'dishes', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'slug' );
            $table->string( 'title' );
            $table->text( 'text' )->nullable();
            $table->boolean( 'live' )->default( 0 );
            $table->date( 'publication' )->nullable();
            $table->date( 'expiration' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'dishes' );
    }
}