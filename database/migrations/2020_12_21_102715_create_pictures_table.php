<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'pictures', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'slug' );
            $table->string( 'title' );
            $table->text( 'text' );
            $table->string( 'filename' );
            $table->boolean( 'live' )->default( 1 );
            $table->boolean( 'welcome' )->default( 0 );
            $table->integer( 'filesize' )->nullable();
            $table->integer( 'width' )->nullable();
            $table->integer( 'height' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'pictures' );
    }
}
