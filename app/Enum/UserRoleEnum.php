<?php

namespace App\Enum;

use App\Traits\EnumHelper;

enum UserRoleEnum: string
{
    use EnumHelper;

    case ADMIN = 'admin';
    case STUDENT = 'student';
    case TEACHER = 'teacher';
}
