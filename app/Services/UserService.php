<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getUserRecentProject($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return null;
        }
        $recent_projects = $user->recent_projects;
        return $recent_projects;
    }
}
