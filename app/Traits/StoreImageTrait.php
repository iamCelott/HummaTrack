<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StoreImageTrait
{
    public function upload_image($image, $directory)
    {
        return $image->store($directory, 'public');
    }

    public function update_image($image, $existingImagePath = null, $directory)
    {
        if ($existingImagePath) {
            Storage::disk('public')->delete($existingImagePath);
        }
        return $this->upload_image($image, $directory);
    }

    public function delete_image($imagePath)
    {
        if ($imagePath) {
            return Storage::disk('public')->delete($imagePath);
        }

        return false;
    }
}
