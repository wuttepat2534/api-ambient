<?php

namespace App\Exceptions\Auth;

use App\Traits\ExceptionRender;
use Exception;

class UserEmailAlreadyExistException extends Exception
{
    use ExceptionRender;

    protected $code = 409;
    protected $message = 'User email already exist.';
}
