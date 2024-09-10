<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamProject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Team(){
        return $this->belongsTo(Team::class);
    }

    public function Project(){
        return $this->belongsTo(Project::class);
    }
}
