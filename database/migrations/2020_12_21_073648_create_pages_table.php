<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'pages', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'slug' );
            $table->string( 'title' );
            $table->text( 'text' )->nullable();
            $table->boolean( 'live' )->default( 0 );
            $table->string( 'template' )->nullable();
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
        Schema::dropIfExists( 'pages' );
    }
}
