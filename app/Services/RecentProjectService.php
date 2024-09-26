<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentProjectService
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

    public function storeUserRecentProject($userId, $projectId)
    {
        $user = User::find($userId);

        $recentProjects = $user->recent_projects()->pluck('project_id')->toArray();

        if (in_array($projectId, $recentProjects)) {
            $user->recent_projects()->detach($projectId);
        }

        if (count($recentProjects) >= 5) {
            $lastIndex = count($recentProjects) - 1;
            $oldestProjectId = $recentProjects[$lastIndex];
            $user->recent_projects()->detach($oldestProjectId);
        }

        return $user->recent_projects()->syncWithoutDetaching([$projectId]);
    }

    public function destroyUserRecentProjects($userId, $projectId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User tidak found'], 404);
        }
        return $user->recent_projects()->detach($projectId);
    }
}
