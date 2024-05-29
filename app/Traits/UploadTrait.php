<?php

namespace App\Traits;

use File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

trait UploadTrait
{
    public function uploadImage($file, $path)
    {
        $fileName = $this->generateFilename() . "." . $file->extension();
        $file->storeAs($path, $fileName);
        $path = "storage/" . $path . "/" . $fileName;
        ImageOptimizer::optimize($path); 
        return $path;
    }

    public function removeFileIfExists($path)
    {
        if(File::exists(public_path($path)))
        {
            File::delete(public_path($path));
        }
    }
}