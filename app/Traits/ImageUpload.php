<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageUpload
{

    /**
     * SaveImage will be used to upload images from diffrent places by using this trait
     */
    public function saveImage(UploadedFile $uploadedFile, $folder = null, $filename = null, $disk = 'public')
    {
        $filename = !is_null($filename) ? $filename : str_random(25);        
        $ext = $uploadedFile->getClientOriginalExtension();
        $filename = $filename . '.' . $ext;

        $image = Image::make($uploadedFile);

        // $image->resize(1920, 1080, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save(public_path() . $folder . $filename);
        $image->save(public_path() . $folder . $filename);

        $image->resize(350, 240, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path() . $folder . 'thumbnails/' . $filename);

        return $filename;
    }


}