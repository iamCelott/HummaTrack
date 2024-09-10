<?php

namespace App\Enums;

enum TeamUserRole: string
{
    case Leader = 'leader';
    case CoLeader = 'co_leader';
    case Member = 'member';
}
