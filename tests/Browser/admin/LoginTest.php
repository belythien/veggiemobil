<?php

namespace Tests\Browser\admin;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase {
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin() {
        $this->browse( function ( $browser ) {
            $browser->visit( '/login' )
                ->type( 'email', 's.hoewer@gmail.com' )
                ->type( 'password', '$w33t-$AU3rkrAUt-bUrg3r' )
                ->press( 'Login' )
                ->assertPathIs( '/dashboard' );
        } );
    }

    public function testLogout() {
        $this->browse( function ( $browser ) {
            $browser->clickLink( 'Logout' )
                ->assertPathIs( '/' );
        } );
    }
}
