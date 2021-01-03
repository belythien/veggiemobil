<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'categories', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'slug' )->index();
            $table->string( 'title' )->nullable();
            $table->text( 'text' )->nullable();
            $table->boolean( 'live' )->default( 1 );
            $table->integer( 'sort' )->default( 0 )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'categories' );
    }
}
