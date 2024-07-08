<?php

namespace App\Exceptions\Auth;

use App\Traits\ExceptionRender;
use Exception;

class InvalidAuthenticationException extends Exception
{
    use ExceptionRender;

    protected $message = 'Your credentials are invalid.';
    protected $code = 401;
}
