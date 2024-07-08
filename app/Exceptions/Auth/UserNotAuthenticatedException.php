<?php

namespace App\Exceptions\Auth;

use App\Traits\ExceptionRender;
use Exception;

class UserNotAuthenticatedException extends Exception
{
    use ExceptionRender;

    protected $code = 401;
    protected $message = 'User not authenticated.';
}
