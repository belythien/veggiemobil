<?php

namespace Tests\Browser\page;

use App\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class visitBySlugTest extends DuskTestCase {

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testVisitBySlug() {
        $this->browse( function ( Browser $browser ) {
            foreach( Page::whereNull( 'external_url' )->get() as $page ) {
                if( $page->live == 1 ) {
                    $browser->visit( '/' . $page->slug )
                        ->assertSee( $page->title );
                } else {
                    $browser->visit( '/' . $page->slug )
                        ->assertSee( '404' );
                }

            }
        } );
    }
}
