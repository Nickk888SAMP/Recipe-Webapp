<?php

namespace App\Traits;

use Str;
use File;

trait HelpersTrait
{
    public function generateFilename() 
    {
        $filename = Str::random(40);
        if (File::exists(public_path($filename))) 
        {
            $filename = $this->generateFilename();
        }
        return $filename;
    }

    
}