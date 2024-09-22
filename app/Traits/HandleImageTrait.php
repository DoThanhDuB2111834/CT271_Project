<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

trait HandleImageTrait
{
    protected $path;
    public function setPath($folder)
    {
        switch ($folder) {
            case "product":
                $this->path = 'Image/product/';
                break;
            default:
                $this->path = 'Image/other/';
        }
    }

    public function saveProductImage(Request $request)
    {
        if ($request->hasFile('images')) {
            $this->setPath('product');
            $imageUrls = [];
            foreach ($request->file('images') as $image) {
                $imageUrls[] = $this->processImage($image);
            }
            return $imageUrls;
        }
        return [];
    }

    public function updateProductImage($request, $oldImageUrls, $deletedImageUrls)
    {
        if ($request->hasFile('images') || !empty($request->input('old-images'))) {
            foreach ($deletedImageUrls as $imageUrl) {
                $this->deleteImage($imageUrl);
            }

            $newImageUrls = $this->saveProductImage($request);
            $imageUrls = array_merge($oldImageUrls, $newImageUrls);

            return $imageUrls;
        }
        return [];
    }

    public function processImage($image)
    {
        $name = time() . uniqid() . '.' . $image->getClientOriginalExtension();
        Image::read($image)->save($this->path . $name);
        $imageUrl = $this->path . $name;

        return $imageUrl;
    }

    public function deleteImage($imageName)
    {
        if ($imageName && file_exists($imageName)) {
            unlink($imageName);
        }
    }
}