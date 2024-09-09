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
        'image',
        'name',
        'start_date',
        'end_date',
        'status',
        'description',
    ];

    public function kanban():HasOne{
        return $this->hasOne(Kanban::class);
    }
}
