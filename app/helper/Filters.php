<?php

namespace App\helper;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Filters implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(640, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    }
}
