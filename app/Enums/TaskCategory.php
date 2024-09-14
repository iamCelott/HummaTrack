<?php

namespace App\Enums;

enum TaskCategory: string
{
    case UiUx = 'ui/ux';
    case Digmar = 'digmar';
    case Frontend = 'frontend';
    case Backend = 'backend';
    case Mobile = 'mobile';
}
