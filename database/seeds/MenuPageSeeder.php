<?php

use App\Menu;
use App\Page;
use Illuminate\Database\Seeder;

class MenuPageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $menu = Menu::where( 'label', 'Welcome' )->first();
        foreach( Page::whereIn( 'slug', [ 'catering', 'truck-menu', 'events' ] )->get() as $key => $page ) {
            DB::table( 'menu_page' )->insert( [
                'menu_id' => $menu->id,
                'page_id' => $page->id,
                'sort'    => ( $key + 1 ) * 10,
            ] );
        }

        $menu = Menu::where( 'label', 'Topbar' )->first();
        foreach( Page::whereIn( 'slug', [ 'truck-menu', 'catering', 'events' ] )->get() as $key => $page ) {
            DB::table( 'menu_page' )->insert( [
                'menu_id' => $menu->id,
                'page_id' => $page->id,
                'sort'    => ( $key + 1 ) * 10,
            ] );
        }

        $menu = Menu::where( 'label', 'Footer' )->first();
        foreach( Page::whereIn( 'slug', [ 'impressum', 'datenschutz' ] )->get() as $key => $page ) {
            DB::table( 'menu_page' )->insert( [
                'menu_id' => $menu->id,
                'page_id' => $page->id,
                'sort'    => ( $key + 1 ) * 10,
            ] );
        }

    }
}
