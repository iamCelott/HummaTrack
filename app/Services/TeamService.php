<?php

namespace App\Services;

use App\Models\TeamUser;
use App\Traits\TeamUniqueCodeTrait;
use Illuminate\Http\Request;

class TeamService
{
    use TeamUniqueCodeTrait;
    // public function create_team_user($teamId, $userIds)
    // {
    //     foreach ($userIds as $userId) {
    //         TeamUser::create([
    //             'team_id' => $teamId,
    //             'user_id' => $userId,
    //         ]);
    //     }
    // }

    public function generateCode()
    {
        return $this->generateUniqueCode();
    }
}
