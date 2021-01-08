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
            $table->string( 'slug' )->index();
            $table->string( 'title' );
            $table->text( 'text' )->nullable();
            $table->boolean( 'live' )->default( 0 );
            $table->timestamps();
            $table->timestamp( 'ts' )->default( \DB::raw( 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP' ) );
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
