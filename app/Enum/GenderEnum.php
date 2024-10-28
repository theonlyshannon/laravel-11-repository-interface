<?php

namespace App\Enum;

use App\Traits\EnumHelper;

enum GenderEnum: string
{
    use EnumHelper;

    case MALE = 'admin';
    case FEMALE = 'student';
}
