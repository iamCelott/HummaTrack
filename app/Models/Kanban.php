<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kanban extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project():BelongsTo{
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function task():HasMany{
        return $this->hasMany(Task::class);
    }
}
