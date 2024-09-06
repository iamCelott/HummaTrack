<?php

namespace App\Models;

use App\Enums\ProjectLevelRequirement;
use App\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => ProjectStatus::class,
        'level_requirement' => ProjectLevelRequirement::class,
    ];

    protected $fillable = [
        'name',
        'start_date',
        'level_requirement',
        'status',
        'description'
    ];

    public function kanban():HasOne{
        return $this->hasOne(Kanban::class);
    }
}
