<?php

namespace App;

use App\Traits\ImageUpload;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
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

    /* === CRUD === */

    public static function createPicture( $request ) {
        $picture = new Picture();
        $picture->fill( $request->input() );

        if( $request->has( 'filename' ) ) {
            $image = $request->file( 'filename' );
            $filename = Str::slug( $request->input( 'title' ) ) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $picture->uploadOne( $image, $filename );
            $picture->filename = $filename;
        }

        $picture->save();
        $picture->dishes()->sync( $request->get( 'dishes' ) );
        $picture->events()->sync( $request->get( 'events' ) );

        return $picture;
    }

    public function updatePicture( $request ) {
        $this->fill( $request->input() );
        $this->save();
        $this->dishes()->sync( $request->get( 'dishes' ) );
        $this->events()->sync( $request->get( 'events' ) );
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
