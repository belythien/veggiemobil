<?php

namespace App;

use App\Traits\ImageUpload;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Picture extends Model {

    use Sluggable;
    use ImageUpload;

    protected $fillable = [ 'slug', 'title', 'text', 'live', 'welcome', 'filename', 'width', 'height' ];

    /* === GUI === */

    public function getGuiNameAttribute() {
        return $this->title;
    }

    public static function getPicturablesForDropdownlist() {
        $result = [];
        foreach( Picture::all() as $picture ) {
            foreach( $picture->dishes as $dish ) {
                $result[ 'App\Dish_' . $dish->id ] = $dish->gui_name;
            }
            foreach( $picture->events as $event ) {
                $result[ 'App\Event_' . $event->id ] = $event->gui_name;
            }
        }
        asort( $result );
        return $result;
    }

    /* === SCOPE === */

    public function scopeOnWelcomePage( $query ) {
        return $query->where( 'live', 1 )->where( 'welcome', 1 );
    }

    public function scopeLive( $query ) {
        return $query->where( 'live', 1 );
    }

    /* === RELATIONS === */

    public function dishes() {
        return $this->morphedByMany( Dish::class, 'picturable' );
    }

    public function events() {
        return $this->morphedByMany( Event::class, 'picturable' );
    }

    public function pages() {
        return $this->morphedByMany( Page::class, 'picturable' );
    }

    /* === CRUD === */

    public static function createPicture( $request ) {
        $picture = new Picture();
        $picture->fill( $request->input() );

        if( $request->has( 'filename' ) ) {
            $image = $request->file( 'filename' );
            $filename = Str::slug( $request->input( 'title' ) ) . '.' . $image->getClientOriginalExtension();
//            $filename = Str::slug( $request->input( 'title' ) ) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $picture->uploadOne( $image, $filename );
            $picture->filename = $filename;
        }

        $picture->save();
        $picture->dishes()->sync( $request->get( 'dishes' ) );
        $picture->events()->sync( $request->get( 'events' ) );
        $picture->pages()->sync( $request->get( 'pages' ) );

        return $picture;
    }

    public static function createPictures( $request ) {
        $result = new Collection();
        foreach( $request->filenames as $image ) {
            $picture = new Picture();
            $picture->title = $image->getClientOriginalName();
            $picture->uploadOne( $image, $image->getClientOriginalName() );
            $picture->filename = $image->getClientOriginalName();
            $picture->save();
            $result->add( $picture );
        }
        return $result;
    }

    public function updatePicture( $request ) {
        $this->fill( $request->input() );
        $this->save();
        $this->dishes()->sync( $request->get( 'dishes' ) );
        $this->events()->sync( $request->get( 'events' ) );
        $this->pages()->sync( $request->get( 'pages' ) );
    }

    public function deletePicture() {
        if( File::exists( public_path( 'img/' . $this->filename ) ) ) {
            File::delete( public_path( 'img/' . $this->filename ) );
        }
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
