<?php

namespace App\Enums;

enum WizkidRole: string
{
    case BOSS = 'boss';
    case DEVELOPER = 'developer';
    case DESIGNER = 'designer';
    case INTERN = 'intern';
}
