<?php

namespace App\Exceptions\Auth;

use App\Traits\ExceptionRender;
use Exception;

class AlreadVerifyExeption extends Exception
{
    use ExceptionRender;

    protected $code = 400;
    protected $message = 'User already verified.';
}
