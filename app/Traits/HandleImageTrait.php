<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

trait HandleImageTrait
{
    protected $path;

    public function veryfy($request)
    {
        $typeImage = $request->input('type_image');
        if ($typeImage == "product") {
            return $request->hasFile('images') || !empty($request->input('old-images'));
        } else {
            return $request->hasFile('image');
        }
    }

    // public function saveProductImage(Request $request)
    // {
    //     if($request->hasFile('images') || !empty($request->input('old-images'))){
    //         foreach
    //     }
    // }

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
            $imageType = $request->input('type_image');
            if ($imageType == 'product') {
                $images = $request->file('images');
                $names = [];
                foreach ($images as $image) {
                    $name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                    Image::read($image)->save($this->path . $name);
                    array_push($names, $this->path . $name);
                }
                return $names;
            } else {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                Image::read($image)->save($this->path . $name);
                return $name;
            }
        }
    }

    public function updateImage($request, $currentImages, $deletedImages = null)
    {
        if ($this->veryfy($request)) {
            $imageType = $request->input('type_image');
            switch ($imageType) {
                case 'product':
                    foreach ($deletedImages as $item) {
                        $this->deleteImage($item);
                    }
                    $newImages = $this->saveImage($request);
                    $images = array_merge($newImages, $currentImages);
                    return $images;
                // break;
                default:
                    $this->deleteImage($currentImages);
                    return $this->saveImage($request);
            }
            // $image = $this->saveImage($request);
        }

        return $currentImages;
    }

    public function deleteImage($imageName)
    {
        if ($imageName && file_exists($imageName)) {
            unlink($imageName);
        }
    }
}