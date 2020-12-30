<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPage extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'menu_page', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'menu_id' )->unsigned()->index();
            $table->bigInteger( 'page_id' )->unsigned()->index();
            $table->integer( 'sort' )->default( 0 );

            $table->foreign( 'menu_id' )->references( 'id' )->on( 'menus' )->onDelete( 'cascade' );
            $table->foreign( 'page_id' )->references( 'id' )->on( 'pages' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'menus_pages' );
    }
}
