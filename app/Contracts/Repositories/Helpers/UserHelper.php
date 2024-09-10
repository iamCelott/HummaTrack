<?php

namespace App\Helpers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserHelper
{
    /**
     * Handle get user role
     *
     * @return string
     */

    public static function getUserRole(): string
    {
        if (Auth::check()) {
            return Auth::user()->roles->pluck('name')[0];
        } else {
            return 'Anda belum login';
        }
    }

    /**
     * Handle get username
     *
     * @return string
     */

    public static function getUserName(): string
    {
        return Auth::user()->name;
    }

    /**
     * Handle get email
     *
     * @return string
     */

    public static function getUserEmail(): string
    {
        return Auth::user()->email;
    }

    /**
     * Handle get phone_number
     *
     * @return string
     */

    public static function getUserPhone(): string
    {
        return Auth::user()->phone_number ?? 'Nomor belum terdaftar';
    }

    /**
     * Handle get photo
     *
     * @return string|null
     */

    public static function getUserPhoto(): string|null
    {
        return Auth::user()->photo;
    }

}
