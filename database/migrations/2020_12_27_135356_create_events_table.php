<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'events', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'slug' );
            $table->string( 'title' );
            $table->text( 'text' )->nullable();
            $table->date( 'date_from' )->nullable();
            $table->date( 'date_to' )->nullable();
            $table->boolean( 'live' )->default( 1 );
            $table->string( 'external_url' )->nullable();
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
        Schema::dropIfExists( 'events' );
    }
}
