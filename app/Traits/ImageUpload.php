<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageUpload {

    public function uploadOne( UploadedFile $uploadedFile, $filename, $disk = 'public' ) {

        $file = $uploadedFile->storeAs( 'img', $filename, $disk );
        return $file;
    }

}
