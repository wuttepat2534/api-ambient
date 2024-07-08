<?php

namespace App\Exceptions\Auth;

use App\Traits\ExceptionRender;
use Exception;

class InvalidPinExeption extends Exception
{
    use ExceptionRender;

    protected $code = 400;
    protected $message = 'User pin is invalid or expired.';
}
