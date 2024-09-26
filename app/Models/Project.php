<?php

namespace App\Models;

use App\Enums\ProjectLevelRequirement;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    protected $fillable = [
        // 'image',
        'name',
        'subtitle',
        'start_date',
        'end_date',
        'type',
        'status',
        'description',
        'created_by'
    ];

    public function kanban(): HasOne
    {
        return $this->hasOne(Kanban::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_projects', 'project_id', 'team_id')
            ->withTimestamps();
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function recent_projects()
    {
        return $this->belongsToMany(Project::class, 'recent_projects', 'project_id', 'user_id')
            ->withPivot('opened_at')
            ->orderBy('opened_at', 'desc');
    }
}
