<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'picturables', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'picture_id' )->unsigned()->index();
            $table->bigInteger( 'picturable_id' )->unsigned()->index();
            $table->string( 'picturable_type' )->index();
            $table->integer( 'sort' )->nullable()->default( 0 );
            $table->timestamps();
            $table->timestamp( 'ts' )->default( \DB::raw( 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP' ) );

            $table->foreign( 'picture_id' )->references( 'id' )->on( 'pictures' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'picturables' );
    }
}
