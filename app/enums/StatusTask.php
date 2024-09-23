<?php

namespace App\Enums;

enum StatusTask: string
{
        case To_do = 'to_do';
    case In_progres = 'in_progress';
    case Review = 'review';
    case Done = 'done';

}
