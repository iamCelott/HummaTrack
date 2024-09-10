<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function members()
    {
    return $this->belongsToMany(Team::class, 'team_users', 'team_id', 'user_id')->withPivot('role');
    }

    public function leader()
    {
        return $this->hasOne(Team::class)->where('role', 'leader');
    }
}
