<?php

namespace App\Utils;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class UserAccessToken extends SanctumPersonalAccessToken
{
    protected $table = 'tokens';
}
