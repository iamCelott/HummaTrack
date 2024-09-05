<?php

namespace App;

enum ProjectStatus: string
{
    case NotStarted = 'not_started';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case OnHold = 'on_hold';
}
