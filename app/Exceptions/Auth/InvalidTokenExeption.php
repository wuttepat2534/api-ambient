<?php

namespace App\Exceptions\Auth;

use App\Traits\ExceptionRender;
use Exception;

class InvalidTokenExeption extends Exception
{
    use ExceptionRender;

    protected $code = 400;
    protected $message = 'Token is not valid.';
}
