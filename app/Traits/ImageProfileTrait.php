<?php

namespace App\Traits;

trait ImageProfileTrait
{
    public function getProfileImage($img)
    {
        $photoUrl = "";
        if (!empty($img) && strpos($img, 'profile_images/') !== false) {
            $photoUrl = asset('storage/' . $img);
        } else {
            $photoUrl = $img;
        }

        return $photoUrl;
    }
}
