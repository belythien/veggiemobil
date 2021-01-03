<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorizables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'categorizables', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'category_id' )->unsigned()->index();
            $table->bigInteger( 'categorizable_id' )->unsigned()->index();
            $table->string( 'categorizable_type' )->index();
            $table->integer( 'sort' )->nullable()->default( 0 );
            $table->timestamps();

            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'categorizables' );
    }
}
