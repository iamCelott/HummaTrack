<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id')
            ->withPivot('role')
            ->withTimestamps();
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'team_projects', 'team_id', 'project_id')
            ->withTimestamps();
    }

    // public function leader()
    // {
    //     return $this->hasOne(Team::class, 'team_users', 'team_id', 'user_id')->where('role', 'leader');
    // }

    public function create_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function leader()
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id')
            ->wherePivot('role', 'leader')
            ->withTimestamps();
    }
}
