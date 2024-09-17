<?php

namespace App\Traits;

use Intervention\Image\Laravel\Facades\Image;

trait HandleImageTrait
{
    protected $path;

    public function veryfy($request)
    {
        return $request->hasFile('image');
    }

    public function setPath($request)
    {
        switch ($request->input('type_image')) {
            case "product":
                $this->path = 'Image/product/';
                break;
            default:
                $this->path = 'Image/other/';
        }
    }

    public function saveImage($request)
    {
        if ($this->veryfy($request)) {
            $this->setPath($request);
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::read($image)->save($this->path . $name);

            return $name;
        }
        return 'No';
    }

    public function updateImage($request, $currentImage)
    {
        if ($this->veryfy($request)) {
            $this->deleteImage($currentImage);

            return $this->saveImage($request);
        }

        return $currentImage;
    }

    public function deleteImage($imageName)
    {
        if ($imageName && file_exists($this->path . $imageName)) {
            unlink($this->path . $imageName);
        }
    }
}