<?php

namespace App\Enums\Users;

enum Role: string
{
    case Admin = 'admin';
    case User = 'user';
}
