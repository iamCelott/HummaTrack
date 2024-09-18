<?php

namespace App\Enums;

enum TaskCategory: string
{
    case UiUx = 'Ui/ux';
    case Digmar = 'Digmar';
    case Frontend = 'Frontend';
    case Backend = 'Backend';
    case Mobile = 'Mobile';
}
