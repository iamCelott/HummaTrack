<?php

namespace App\Helpers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ImageProfileHelper
{
    /**
     * Handle get user role
     *
     * @return string
     */

    public static function getPhotoProfile($img)
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
